<?php echo $__env->make('Chatify::layouts.headLinks', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="messenger">
    
    <div class="messenger-listView">
        
        <div class="m-header">
            <nav>
                <a href="#"><i class="ti ti-inbox"></i> <span class="messenger-headTitle"><?php echo e(__('MESSAGES')); ?></span> </a>
                
                <nav class="m-header-right">
                    <a href="#"><i class="ti ti-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="ti ti-times"></i></a>
                </nav>
            </nav>
            
            <input type="text" class="messenger-search" placeholder="Search" />
            
            <div class="messenger-listView-tabs">
                <a href="#" <?php if($route == 'user'): ?> class="active-tab" <?php endif; ?> data-view="users">
                    <span class="far fa-user"></span><?php echo e(__('Recent')); ?></a>
                <a href="#" <?php if($route == 'group'): ?> class="active-tab" <?php endif; ?> data-view="groups">
                    <span class="ti ti-users"></span><?php echo e(__('Members')); ?></a>
            </div>
        </div>
        
        <div class="m-body">
           
           
           <div class="<?php if($route == 'user'): ?> show <?php endif; ?> messenger-tab app-scroll" data-view="users">

               
               <div class="favorites-section">
                <p class="messenger-title"><?php echo e(__('Favorites')); ?></p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               
               <?php echo view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render(); ?>


               
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           
           <div class="<?php if($route == 'group'): ?> show <?php endif; ?> messenger-tab app-scroll" data-view="groups">
                
                <p style="text-align: center;color:grey;"><?php echo e(__('Soon will be available')); ?></p>
             </div>

             
           <div class="messenger-tab app-scroll" data-view="search">
                
                <p class="messenger-title"><?php echo e(__('Search')); ?></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span><?php echo e(__('Type to search..')); ?>.</span></p>
                </div>
             </div>
        </div>
    </div>

    
    <div class="messenger-messagingView">
        
        <div class="m-header m-header-messaging">
            <nav>
                
                <div style="display: inline-flex;">
                    <a href="#" class="show-listView"><i class="ti ti-arrow-left"></i></a>
                    <?php if(!empty(Auth::user()->avatar)): ?>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;background-image: url('<?php echo e(asset('/storage/'.Auth::user()->avatar)); ?>');"></div>
                    <?php else: ?>
                        <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;background-image: url('<?php echo e(asset('/storage/avatars/avatar.png')); ?>');"></div>
                    <?php endif; ?>
                    
                    <a href="#" class="user-name"><?php echo e(config('chatify.name')); ?></a>
                </div>
                
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="ti ti-star"></i></a>
                    <a href="/"><i class="ti ti-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="ti ti-info-circle"></i></a>
                </nav>
            </nav>
        </div>
        
        <div class="internet-connection">
            <span class="ic-connected"><?php echo e(__('Connected')); ?></span>
            <span class="ic-connecting"><?php echo e(__('Connecting...')); ?></span>
            <span class="ic-noInternet"><span class="ic-noInternet"><?php echo e(__('gfdhjdg')); ?></span>
        </span>
        </div>
        
        <div class="m-body app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span><?php echo e(__('Please select a chat to start messaging')); ?></span></p>
            </div>
            
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            
            <?php echo $__env->make('Chatify::layouts.sendForm', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
    
    <div class="messenger-infoView app-scroll">
        
        <nav>
            <a href="#"><i class="ti ti-times"></i></a>
        </nav>
        <?php echo view('Chatify::layouts.info')->render(); ?>

    </div>
</div>

<?php echo $__env->make('Chatify::layouts.modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('Chatify::layouts.footerLinks', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/vendor/munafio/chatify/src/views/pages/app.blade.php ENDPATH**/ ?>