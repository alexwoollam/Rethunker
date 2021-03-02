<?php 

use App\Boot;
use App\Controller\Api\Pages\Get;
use App\Controller\Users\User;
use App\Helpers\Log;

( new Log )->Info('...Testing error logger.');

global $container;

$get = new Get();
$pages = $container['ReCMS.Fields.Pages'];
$pagecount = $get->Count();
$editing_page = 99;
$new_page = true;
if(isset($_GET["id"])){
    $new_page = false;
    $editing_page = intval($_GET["id"]);
}
$current_page = $get->WithId($editing_page);

?>

<div class="container-fluid d-flex" style="background-color: #f2f2f2; min-height: calc( 100vh - 56px );">
    <div class="row align-items-start w-100" style="min-height: calc( 100vh - 56px );">
        <?php if($pagecount > 0):?>
        <div class="p-4 col-2 bg-primary h-100">
            <div class="nav navbar-primary bg-primary">
                <div class="ul" class="navbar-nav ml-auto">
                        <?php foreach($pages as $page) {
                            ?>
                                <li class="nav-item <?php currentPage('/page-edit?id='.$page['id']);?>" >
                                    <a class="nav-link" href="<?php echo '/page-edit?id='.$page['id']?>" style="color: white">
                                        <?php echo $page['title'] ?>
                                        <?php if( $page['status'] === 'draft' ){ echo '(draft)'; }?>
                                    </a>
                                </li>
                            <?php
                        }                        
                        ?>
                    
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col p-5" style="min-height: calc( 100vh - 56px );">
            <form class="bg-light p-5" method="post" action="<?php if($new_page){echo '/api/page/new/'; }else{ echo '/api/page/update/'; };?>">
                <?php if($new_page){ 
                    echo '<h2>New Page</h2>'; 
                }else{
                    echo '<h2>Editing \''.$current_page['title'].'\'</h2>';
                }
                ?>
                <div class="mb-3">
                    <label for="page_title" class="form-label">Page Title</label>
                    <input name="title" type="text" class="form-control" id="page_title" value="<?php echo $current_page['title'] ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">This is the title for your page.</div>
                </div>

                <div class="mb-3">
                    <label for="page_content" class="form-label">Page Content</label>
                    <textarea name="content" type="text" class="form-control" id="page_content"><?php echo $current_page['content'] ?></textarea>
                </div>
                
                <div class="mb-3 form-check">
                    <input name="status" <?php if( $current_page['status'] === "published" ){ echo "checked='true'"; } ?> type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Publish?</label>
                </div>
                <input type="hidden" name="current_user" value="<?php echo (new User)->GetEmail(); ?>">
                <input type="hidden" name="id" value="<?php echo $current_page['id']?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>