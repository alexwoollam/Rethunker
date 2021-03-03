<?php 
use App\Helpers\Functions;

?>

<div class="container-fluid d-flex" style="background-color: #f2f2f2; min-height: calc( 100vh - 56px );">
    <div class="row align-items-start w-100" style="min-height: calc( 100vh - 56px );">
        <?php if($data['pagecount'] > 0):?>
        <div class="p-4 col-2 bg-primary h-100">
            <div class="admin-sidebar nav navbar-primary bg-primary">
                <div class="ul" class="navbar-nav ml-auto">
                        <?php foreach($data['pages'] as $page) {
                            ?>
                                <li class="nav-item <?php ( new Functions )->currentPage('/page-edit?id='.$page['id']);?>" >
                                    <a class="nav-link" href="<?php echo '/page-edit?id='.$page['id']?>">
                                        <?php echo $page['title'] ?>
                                        <?php if( $page['status'] === 'draft' ){ echo '(draft)'; }?>
                                    </a>
                                </li>
                            <?php
                        }                        
                        ?>
                        <li class="nav-item <?php ( new Functions )->currentPage('/page-edit'); ?>" >
                                    <a class="nav-link" href="/page-edit" style="color: white">
                                        New Page
                                    </a>
                        </li>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col p-5" style="min-height: calc( 100vh - 56px );">
            <form class="bg-light p-5" method="post" action="<?php if($data['new_page']){echo '/api/page/new/'; }else{ echo '/api/page/update/'; };?>">
                <?php if($data['new_page']){ 
                    echo '<h2>New Page</h2>'; 
                }else{
                    echo '<h2>Editing \''.$data['current_page']['title'].'\'</h2>';
                }
                ?>
                <div class="mb-3">
                    <label for="page_title" class="form-label">Page Title</label>
                    <input name="title" type="text" class="form-control" id="page_title" value="<?php echo $data['current_page']['title'] ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">This is the title for your page.</div>
                </div>

                <div class="mb-3">
                    <label for="page_content" class="form-label">Page Content</label>
                    <textarea name="content" type="text" class="form-control" id="page_content"><?php echo $data['current_page']['content'] ?></textarea>
                </div>
                
                <div class="mb-3 form-check">
                    <input name="status" <?php if( $data['current_page']['status'] === "published" ){ echo "checked='true'"; } ?> type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Publish?</label>
                </div>
                <input type="hidden" name="current_user" value="<?php echo $data['current_user'] ?>">
                <input type="hidden" name="id" value="<?php echo $data['current_page']['id']?>">
                <button type="submit" class="btn btn-primary"><?php if($data['new_page']){ 
                    echo 'Add page'; 
                }else{
                    echo 'Update page';
                }
                ?></button>
            </form>

            <form method="post" action="/api/page/delete/">
                    <input type="hidden" name="id" value="<?php echo $data['current_page']['id']?>">
                    <button type="submit" class="btn btn-danger">Delete page</button>
            </form>

            
        </div>
    </div>
</div>