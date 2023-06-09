<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    $inputFileName = 'table.xlsx';
    $sheetname = 'Sheet1';
    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    $reader->setLoadSheetsOnly($sheetname);
    
    class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
        //  选定区域
        if ($row >= 1 && $row <= 20) {
            if (in_array($column, range('A','B'))) {
                return true;
            }
        }
        return false;
    }
}
    $filterSubset = new MyReadFilter();
    $reader->setReadFilter($filterSubset);
    $spreadsheet = $reader->load($inputFileName);
    $workSheet = $spreadsheet->getActiveSheet();
    $cellA1 = $workSheet->getCell('A17');
    //echo 'Value: ', $cellA1->getValue(),PHP_EOL;
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>前台网页显示</title>
    <style>
        #max{
            width: 1200px;
            height: 900px;
            align-items: right;
            margin:5% auto;
            margin-top: 0%;
            float: left;
        }
        #table{
            float: left;
            width: 600px;
            /*
            height: 590px;
            */
        }
        #main{
            width: 1900px;
        }
        .re{
            position: relative;
            height: 900px;
        }
        .re ul{
            list-style-type:none ;
        }
        .re ul>li{
            width: 1200px;
            height: 1000px;
            position: absolute;
            margin-top: -15px;
            margin-left: -20px;
            transition: 1s;
            opacity: 0;
        }
        .re ul>li img{
            width: 1200px;
            height: 1000px;
            border: 15px solid #fffbd6;
            user-select: none;
        }
        
        .re ul>li span{
            margin-top: -105px;
            margin-left: 700px;
            position: absolute;
            font-size:55px;
            color:red;
            user-select: none;
        }
        #max ol {
            position: relative;
            display:grid;
            grid-template-columns: repeat(8,50px);
            grid-template-rows: auto;
            grid-gap: 1em;gap: 1em;
            float: right;
            margin-top: 950px;
            margin-right: 600px;
            list-style: none;
            top:0;left:0;
        }
        #max ol li {
            width: 25px;
            height: 10px;
            font-size: 5px;
            line-height: 10px;
            float: center;
            text-align: center;
            border-radius: 2em;
            border: 5px solid #999999;
        }
        table{
            width: 600px;
            border-collapse: collapse;
            user-select: none;
            border:2px solid rgba(0, 0, 0, 15)
        }

        thead{
            background-color: #ffff00;
            color: #000;
        }

        tbody{
            background-color: #fff;

        }
        th{
            font-size:  30px;
            padding: 20px;
        }

        td{
            font-size: 30px;
            padding: 20px;
        }
        tr{
            text-align: center;
        }

        tbody>tr>td:nth-child(1){
            border-right: 2px solid rgba(0, 0, 0, 0.05);
        }
        
        tbody>tr:nth-child(2n){
            background-color: rgba(0, 0, 0, 0.05);
        }

        .title{
            background-color: #b8a7a7;
            font-size: 50px;
        }
        #saying{
            text-align: center;
            margin-left: 10%;
            margin-top: 5%;
            font-size: 40px;
            color: red;
        }
        .weather{
            user-select: none;
            margin-top: 30px;
            margin-left: 150px;
            transform: scale(1.5);
        }
        #dateTime{
            margin-top: 20px;
            user-select: none;
            font-size: 50px;
            text-align: center;
            font-style: normal;
        }
    </style>
</head>

<body style="background-color: #ffff00;">
    <div id="main">
        <div id="table">
            <table>
                <thead>
                    <tr>
                        <th class="title" colspan="3">彦聚公寓</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th colspan="1">房型</th>
                        <th colspan="1">门市价</th>
                        <th colspan="1">钟点价</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php 
                        echo $workSheet->getCell('A1')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A6')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A11')->getValue(),PHP_EOL;
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A2')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td><?php 
                        echo $workSheet->getCell('A7')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td><?php 
                        echo $workSheet->getCell('A12')->getValue(),PHP_EOL;
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A3')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A8')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A13')->getValue(),PHP_EOL;
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A4')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A9')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A14')->getValue(),PHP_EOL;
                        ?>
                        </td>
                    </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?php 
                        echo $workSheet->getCell('A5')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A10')->getValue(),PHP_EOL;
                        ?>
                        </td>
                        <td>
                        <?php 
                        echo $workSheet->getCell('A15')->getValue(),PHP_EOL;
                        ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <td style="font-size: 20px; background-color: aliceblue;">温馨提示:宾客退房时间为中午12点，超过一小时加收20元房费</td>
                    </tr>
                </thead>
            </table>
            <div class="time">
                <script>
                    Date.prototype.format = function (fmt) {
                        var o = {
                            "y+": this.getFullYear, //年
                            "M+": this.getMonth() + 1, //月份
                            "d+": this.getDate(), //日
                            "h+": this.getHours(), //小时
                            "m+": this.getMinutes(), //分
                            "s+": this.getSeconds() //秒
                        };
                        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
                        for (var k in o)
                            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
                        return fmt;
                    }
                    setInterval("document.getElementById('dateTime').innerHTML = (new Date()).format('yyyy-MM-dd hh:mm:ss');", 1000);
                </script>
                <div id="dateTime"></div>
            </div>
        <div class="weather">
            <iframe width="400" height="100" scrolling="no" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=5&num=5&site=12"></iframe> 
        </div>
    </div>
    <div id="max">
        <div class="re">
            <ul>
                <li><img src="./pictures/1.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B1')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/2.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B2')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/3.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B3')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/4.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B4')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/5.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B5')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/6.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B6')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/7.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B7')->getValue(),PHP_EOL;
                        ?>
                </span></li>
                <li><img src="./pictures/8.png" alt=""><span>
                <?php 
                        echo $workSheet->getCell('B8')->getValue(),PHP_EOL;
                        ?>
                </span></li>
            </ul>
            <ol>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ol>
        </div>
            <h1 id="saying"></h1>
        </div>
    </div>
    </div>
    <script>
        window.onload = function(){
        var box=this.document.getElementsByClassName("re")[0];
        var lik=box.getElementsByTagName("li");
        //var title= 
        function fun(i,j){//转换图片函数，就是把透明度改了一下
            lik[i].style.opacity=1;
            lik[j].style.opacity=0;
            lik[i+8].style.backgroundColor="#ffffff";//改一下小图标
            lik[j+8].style.backgroundColor="#00000000"
        }
        fun(0,1);//初始化下
        var i =0;
        function auto()
        {//轮播循环函数
            if(++i>=8)
            {
            i=0;
            fun(0,7);
            }
            else fun(i,i-1);
        }
        timer=this.setInterval(auto,3000);
        var j =0;
        for(;j<8;j++){//点击小图标也可以转换图片
            lik[j+8].ind=j;
            lik[j+8].onclick=function(){
            fun(this.ind,i)
            i=this.ind;
            }
        }

        }
    </script>
</body>
</html>