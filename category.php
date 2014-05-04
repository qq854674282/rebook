<?php include 'include/header.php' ?>
<br><br>
<div class="clearfix"></div>
<div class="container">
    <div class="main_content">
        <div class="book_line">
            <div class="book_line_title">
                <a href="#" class="book_line_title_1 pull-left">电子--大二</a><!--搜索关键词或分类关键词-->
            </div>
            <div class="clearfix"></div>
            <?php
            for ($i=1; $i<=20; $i++)
              include 'include/book_line_box.php'
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="pagination pull-right">
            <ul>
                <li><a href="#">前一页</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">后一页</a></li>
            </ul>
        </div>        

    </div>

    <div class="slide_content">
        <div class="slide_book_list">
            <h3>图书推荐</h3>
            <ul>
                <?php for($book_list=0;$book_list<=6;$book_list++ ) include 'include/book_list_box.php' ?>
            </ul>
        </div>
        <div class="slide_book_list">
            <h3>最新发布</h3>
            <ul>
                <?php for($book_list=0;$book_list<=6;$book_list++ ) include 'include/book_list_box.php' ?>
            </ul>
        </div>
    </div>
</div>
<script src="asset/index_none.js"></script>
<?php include 'include/footer.php' ?>
