<?php 
$title = import('nexit/title');
$AddPoll = import('./components/AddPoll');

$Poll = function () use ($title, $AddPoll) {
    $message = '';

    if(isset($_POST['submit'])) {
        $AddPoll();
        $message = <<<HTML
        <div class="alert alert-success text-center">สร้างแบบสอบถามสำเร็จ</div>
        HTML;
    }

    $count = $_GET['count'] ?? 0;
    if($count > 10) $count = 9;
    if($count < 2) $count = 2;
    $count = (int) $count;
    $count_plus = $count+1;
    $count_down = $count-1;

    $answer = "";

    for($i=0; $i < $count; $i++) {
        $answer .= <<<HTML
        <label for="" class="form-label">ตัวเลือก</label>
        <input class="form-control" type="text" name="poll_detail[]" required>
        HTML;
    }


    $title("สร้างแบบสอบถาม");
    return <<<HTML
    <main class="container">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="text-center my-3">สร้างแบบสอบถาม</h1>
                {$message}
                <div>
                    <form action="/admin/poll" method="POST" class="form-control p-3 my-3">
                        
                        <label for="" class="form-label">หัวข้อแบบสอบถาม</label>
                        <input class="form-control" type="text" name="poll_head" required>
                        
                        <div>
                            <a class="btn btn-outline-primary mt-3" href="/admin/poll?count={$count_plus}">+ เพิ่มตัวเลือก</a>
                            <a class="btn btn-outline-danger mt-3" href="/admin/poll?count={$count_down}">- ลบตัวเลือก</a>
                        </div>
                        
                        {$answer}


                        <div class="text-center my-3">
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