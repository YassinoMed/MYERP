<?php

namespace App\Http\Controllers;

use App\Models\LabTestCatalog;
use App\Models\Patient;
use App\Models\PatientConsultation;
use App\Models\PatientLabOrder;
use App\Models\PatientLabResult;
use App\Models\PatientLabSample;
use App\Models\User;
use Illuminate\Http\Request;

class PatientLabOrderController extends Controller
{
    public function index(Request $request)
    {
        if (!\Auth::user()->can('manage patient lab order')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $query = PatientLabOrder::with(['patient', 'consultation', 'labTest', 'sample', 'result'])
            ->where('created_by', \Auth::user()->creatorId())
            ->orderBy('id', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->get();

        return view('patient_lab_order.index', compact('orders'));
    }

    public function create(Request $request)
    {
        if (!\Auth::user()->can('create patient lab order')) {
            return response()->json(['error' => __('Permission denied.')], 401);
        }

        $patients = Patient::where('created_by', \Auth::user()->creatorId())->orderBy('last_name')->get();
        $consultations = PatientConsultation::where('created_by', \Auth::user()->creatorId())
            ->orderBy('consultation_date', 'desc')
            ->get();
        $catalogs = LabTestCatalog::where('created_by', \Auth::user()->creatorId())
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $selectedPatient = $request->get('patient_id');

        return view('patient_lab_order.create', compact('patients', 'consultations', 'catalogs', 'selectedPatient'));
    }

    public function store(Request $request)
    {
        if (!\Auth::user()->can('create patient lab order')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $validator = \Validator::make($request->all(), [
            'patient_id' => 'required|integer',
            'consultation_id' => 'nullable|integer',
            'lab_test_catalog_id' => 'required|integer',
            'sample_type' => 'nullable|string|max:255',
            'priority' => 'required|string|max:50',
            'scheduled_for' => 'nullable|date',
            'clinical_notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }

        $patient = Patient::where('created_by', \Auth::user()->creatorId())->findOrFail($request->patient_id);
        $catalog = LabTestCatalog::where('created_by', \Auth::user()->creatorId())->findOrFail($request->lab_test_catalog_id);

        $consultationId = null;
        if ($request->filled('consultation_id')) {
            $consultationId = PatientConsultation::where('created_by', \Auth::user()->creatorId())
                ->where('patient_id', $patient->id)
                ->where('id', $request->consultation_id)
                ->value('id');
        }

        $order = new PatientLabOrder();
        $order->patient_id = $patient->id;
        $order->consultation_id = $consultationId;
        $order->lab_test_catalog_id = $catalog->id;
        $order->order_number = $this->generateOrderNumber();
        $order->sample_type = $request->sample_type ?: $catalog->sample_type;
        $order->priority = $request->priority;
        $order->status = 'requested';
        $order->requested_by = \Auth::id();
        $order->ordered_at = now();
        $order->scheduled_for = $request->scheduled_for;
        $order->critical_alert = $catalog->critical_supported;
        $order->clinical_notes = $request->clinical_notes;
        $order->created_by = \Auth::user()->creatorId();
        $order->save();

        return redirect()->route('patient-lab-orders.show', $order->id)->with('success', __('Lab order successfully created.'));
    }

    public function show($id)
    {
        if (!\Auth::user()->can('show patient lab order')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $order = PatientLabOrder::with(['patient', 'consultation', 'labTest', 'sample.collector', 'result.validator'])
            ->where('created_by', \Auth::user()->creatorId())
            ->findOrFail($id);

        return view('patient_lab_order.show', compact('order'));
    }

    public function edit($id)
    {
        if (!\Auth::user()->can('edit patient lab order')) {
            return response()->json(['error' => __('Permission denied.')], 401);
        }

        $order = PatientLabOrder::where('created_by', \Auth::user()->creatorId())->findOrFail($id);
        $patients = Patient::where('created_by', \Auth::user()->creatorId())->orderBy('last_name')->get();
        $consultations = PatientConsultation::where('created_by', \Auth::user()->creatorId())
            ->orderBy('consultation_date', 'desc')
            ->get();
        $catalogs = LabTestCatalog::where('created_by', \Auth::user()->creatorId())
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('patient_lab_order.edit', compact('order', 'patients', 'consultations', 'catalogs'));
    }

    public function update(Request $request, $id)
    {
        if (!\Auth::user()->can('edit patient lab order')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $order = PatientLabOrder::where('created_by', \Auth::user()->creatorId())->findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'patient_id' => 'required|integer',
            'consultation_id' => 'nullable|integer',
            'lab_test_catalog_id' => 'required|integer',
            'sample_type' => 'nullable|string|max:255',
            'priority' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'scheduled_for' => 'nullable|date',
            'clinical_notes' => 'nullable|string',
            'result_summary' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }

        $patient = Patient::where('created_by', \Auth::user()->creatorId())->findOrFail($request->patient_id);
        $catalog = LabTestCatalog::where('created_by', \Auth::user()->creatorId())->findOrFail($request->lab_test_catalog_id);

        $consultationId = null;
        if ($request->filled('consultation_id')) {
            $consultationId = PatientConsultation::where('created_by', \Auth::user()->creatorId())
                ->where('patient_id', $patient->id)
                ->where('id', $request->consultation_id)
                ->value('id');
        }

        $order->patient_id = $patient->id;
        $order->consultation_id = $consultationId;
        $order->lab_test_catalog_id = $catalog->id;
        $order->sample_type = $request->sample_type ?: $catalog->sample_type;
        $order->priority = $request->priority;
        $order->status = $request->status;
        $order->scheduled_for = $request->scheduled_for;
        $order->critical_alert = $catalog->critical_supported;
        $order->clinical_notes = $request->clinical_notes;
        $order->result_summary = $request->result_summary;
        $order->save();

        return redirect()->route('patient-lab-orders.show', $order->id)->with('success', __('Lab order successfully updated.'));
    }

    public function destroy($id)
    {
        if (!\Auth::user()->can('delete patient lab order')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $order = PatientLabOrder::where('created_by', \Auth::user()->creatorId())->findOrFail($id);
        if ($order->sample) {
            $order->sample->delete();
        }
        if ($order->result) {
            $order->result->delete();
        }
        $order->delete();

        return redirect()->route('patient-lab-orders.index')->with('success', __('Lab order successfully deleted.'));
    }

    public function collectSample(Request $request, $id)
    {
        if (!\Auth::user()->can('collect patient lab sample')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $order = PatientLabOrder::with('sample')->where('created_by', \Auth::user()->creatorId())->findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'storage_location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }

        $sample = $order->sample ?: new PatientLabSample();
        $sample->patient_lab_order_id = $order->id;
        $sample->sample_code = $sample->sample_code ?: 'SMP-' . str_pad((string) $order->id, 5, '0', STR_PAD_LEFT);
        $sample->sample_type = $order->sample_type;
        $sample->status = 'collected';
        $sample->collected_at = now();
        $sample->collected_by = \Auth::id();
        $sample->storage_location = $request->storage_location;
        $sample->notes = $request->notes;
        $sample->created_by = \Auth::user()->creatorId();
        $sample->save();

        $order->status = 'sample_collected';
        $order->save();

        return redirect()->route('patient-lab-orders.show', $order->id)->with('success', __('Sample successfully collected.'));
    }

    public function validateResult(Request $request, $id)
    {
        if (!\Auth::user()->can('validate patient lab result')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        $order = PatientLabOrder::with(['labTest', 'sample', 'result'])->where('created_by', \Auth::user()->creatorId())->findOrFail($id);

        $validator = \Validator::make($request->all(), [
            'result_value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'reference_range' => 'nullable|string|max:255',
            'result_date' => 'required|date',
            'notes' => 'nullable|string',
            'critical_flag' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }

        $result = $order->result ?: new PatientLabResult();
        $result->patient_id = $order->patient_id;
        $result->consultation_id = $order->consultation_id;
        $result->patient_lab_order_id = $order->id;
        $result->patient_lab_sample_id = optional($order->sample)->id;
        $result->test_name = optional($order->labTest)->name ?: __('Lab Test');
        $result->result_value = $request->result_value;
        $result->unit = $request->unit ?: optional($order->labTest)->unit;
        $result->reference_range = $request->reference_range ?: optional($order->labTest)->reference_range;
        $result->status = 'validated';
        $result->critical_flag = $request->boolean('critical_flag');
        $result->analyzed_by = \Auth::id();
        $result->validated_by = \Auth::id();
        $result->validated_at = now();
        $result->result_date = $request->result_date;
        $result->notes = $request->notes;
        $result->created_by = \Auth::user()->creatorId();
        $result->save();

        $order->status = 'validated';
        $order->result_summary = $result->result_value;
        $order->critical_alert = $result->critical_flag;
        $order->save();

        return redirect()->route('patient-lab-orders.show', $order->id)->with('success', __('Lab result successfully validated.'));
    }

    private function generateOrderNumber()
    {
        $prefix = 'LAB-' . now()->format('ymd') . '-';
        $count = PatientLabOrder::where('created_by', \Auth::user()->creatorId())->count() + 1;

        return $prefix . str_pad((string) $count, 4, '0', STR_PAD_LEFT);
    }
}
