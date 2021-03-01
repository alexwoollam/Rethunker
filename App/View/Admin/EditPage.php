<?php 
use App\Controller\Api\Pages\Get;

$pages = ( new Get('all') )->All();

$current_page = [
    'title' => 'Page title here',
    'content' => 'this is some page content',
    'uri' => '/temp-page',
    'publish_date' => date( 'now' ),
    'update_date' => date( 'now' ),
    'id' => '1'
];

?>


<div class="container-fluid d-flex" style="background-color: #f2f2f2; min-height: calc( 100vh - 56px );">
    <div class="row align-items-start w-100" style="min-height: calc( 100vh - 56px );">
        <div class="p-4 col-2 bg-primary h-100">
            <div class="nav navbar-primary bg-primary">
                <div class="ul" class="navbar-nav ml-auto">
                    <h4 style="color: white">Pages:</h4>
                
                    <li class="nav-item <?php currentPage('/page-edit');?>" >
                        <a class="nav-link" href="" style="color: white">Page title here</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="col p-5" style="min-height: calc( 100vh - 56px );">
            <form class="bg-light p-5">
                <div class="mb-3">
                    <label for="page_title" class="form-label">Page Title</label>
                    <input type="text" class="form-control" id="page_title" value="<?php echo $current_page['title'] ?>" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">This is the title for your page.</div>

                <div class="mb-3">
                    <label for="page_content" class="form-label">Page Content</label>
                    <textarea type="text" class="form-control" id="page_content"><?php echo $current_page['content'] ?></textarea>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>