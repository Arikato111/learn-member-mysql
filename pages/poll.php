<?php 
$title = import('nexit/title');
$AddPoll = import('./components/AddPoll');

$Poll = function () use ($title, $AddPoll) {

    if(isset($_POST['submit'])) {
        $AddPoll();
    }

    $count = $_GET['count'] ?? 0;
    if($count > 10) $count = 9;
    if($count < 1) $count = 1;
    $count = (int) $count;
    $count_plus = $count+1;
    $count_down = $count-1;

    $answer = "";

    for($i=0; $i < $count; $i++) {
        $answer .= <<<HTML
        <label for="" class="form-label">ตัวเลือก</label>
        <input class="form-control" type="text" name="poll_detail[]">
        HTML;
    }


    $title("สร้างแบบสอบถาม");
    return <<<HTML
    <main class="container">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="text-center">สร้างแบบสอบถาม</h1>
                <div>
                    <form action="#" method="POST" class="form-control p-3">
                        
                        <label for="" class="form-label">หัวข้อแบบสอบถาม</label>
                        <input class="form-control" type="text" name="poll_head">
                        
                        <div>
                            <a class="btn btn-outline-primary mt-3" href="/poll?count={$count_plus}">+ เพิ่มตัวเลือก</a>
                            <a class="btn btn-outline-danger mt-3" href="/poll?count={$count_down}">- ลบตัวเลือก</a>
                        </div>
                        
                        {$answer}


                        <div class="text-center">
                            <button class="btn btn-success" name="submit">สร้างแบบสอบถาม</button>
                        </div>

                    </form>
                </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </main>
    HTML;
};

$export = $Poll;