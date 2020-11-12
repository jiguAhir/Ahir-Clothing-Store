<div class="row">
  <div class="pagediv" aria-label="Page navigation">
    <ul class="pagination">
      <?php 
        if($currentPage != $firstPage) 
        { ?>
        <li class="page-item">
           <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
             <span aria-hidden="true">First</span>
          </a>
        </li>
      <?php 
        } 
        if($currentPage >= 2) 
        { ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $previousPage ?>">
              <?php echo $previousPage ?>
            </a>
          </li>
      <?php 
        } ?>
          <li class="page-item active">
            <a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a>
          </li>
      <?php 
        if($currentPage != $lastPage) 
        { ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a>
          </li>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
              <span aria-hidden="true">Last</span>
            </a>
          </li>
      <?php 
        } ?>
    </ul>
  </div> 
</div>          