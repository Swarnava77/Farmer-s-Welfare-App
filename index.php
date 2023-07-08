<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Crop Yield Prediction</title>

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/728d1d3dec.js" crossorigin="anonymous"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form">
    <div class="svgs">
        <img src="imgs/bg_svg.svg">
    </div>
    <div class="page" id="part1">
        <div class="info">
            <div class="heading">
                <div class="title text-primary">Crop Yield Prediction</div>
                <div class="title-support">using Machine Learning</div><br>
                <div class="title-support" style="color:#C0392B">Under Supervision of Dr. Mamta Agrawal:</div>
            </div>
            <div class="dev">
                <div class="text-primary">
                    <i class="far fa-file-code"></i>&nbsp;Developed by:
                </div>
                <ul>
                    <li>T. Joseph</li>    
                    <li>Jayesh Rathore </li>
                    <li>Siddharth Chowdhury</li>
                    <li>Vaishnavi Panchal</li>    
                    <li>Swarnava Laha</li>
                    <li>Vedant Mudaliar</li>
                    <li>Rakshit Dinesh Kumar</li>    
                    <li>Ritam Bhunia</li>
                </ul>
            </div>
            <div class="btn-grp">
                <a href="#part3" class="try">
                    Try it!
                </a>
            </div>
            
        </div>
        <div class="imgContainer">
            <!-- <img src="imgs/farm1.jpg" alt=""> -->
            <img src="imgs/flowers1.jpg" alt="">
        </div>
        <div class="scrollIndicator"></div>
    </div>
    <div class="page" id="part2">
        <div class="card myCard">
            <div class="myCard-img">
                <img src="imgs/input.svg" alt="">
            </div>
            <div class="myCard-title text-blue">Enter soil details</div>
            <div class="myCard-body ">Please provide information on the preferred soil type, including the temperature, humidity, pH, and rainfall range for optimal growth.</div>
        </div>
        <div class="card myCard">
            <div class="myCard-img">
                <img src="imgs/model.svg" alt="">
            </div>
            <div class="myCard-title text-orange">Prediction</div>
            <div class="myCard-body ">A decision tree regressor ML model, trained on past 20 years of data, is used to predict the approximate crop yield</div>
        </div>
        <div class="scrollIndicator"></div>
    </div>
    <div class="container p-5 page" id="part3">
        <div class="imgContainer" style="width:45%">
            <img src="imgs/plant1.jpg" alt="">
        </div>
        <div class="card shadow-lg col-6 p-0 mx-auto">
            <div class="card-header text-primary text-center">
                <h3><u>Crop Yield Predictor</u></h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="temperature">Temperature in degree celsius: <sup style="color:red">*<sup></label>
                    <input type="number" class="form-control" name="temperature" id="temperature" placeholder="Enter temperature"/>
                    <span class="error" style="font-size: 0.8em;display: block;">Please enter temperature in range of 0 to 100.0000</span>
                </div>
                <div class="form-group">
                    <label for="humidity">Humidity in g.m<sup>-3</sup>:<sup style="color:red"> *<sup></label>
                    <input type="number" class="form-control" name="humidity" id="humidity" placeholder="Enter humidity"/>
                    <span class="error" style="font-size: 0.8em;display: block;">Please enter humidity in range of 0 to 200.0000</span>
                </div>
                <div class="form-group">
                    <label for="pH">PH in range of 0 - 14:<sup style="color:red"> *<sup></label>
                    <input type="number" name="pH" class="form-control" id="pH" placeholder="Enter pH"/>
                    <span class="error" style="font-size: 0.8em;display: block;">Please enter pH in range of 0 to 14.0000</span>
                </div>
                <div class="form-group">
                    <label for="rain">Rainfall in mm:<sup style="color:red"> *<sup></label>
                    <input type="number" class="form-control" name="rain" id="rain" placeholder="Enter rainfall in area">
                    <span class="error" style="font-size: 0.8em;display: block;">Please enter rainfall in range of 0 to 600.0000</span>
                </div>
                <div class="row">
                    <button class="btn btn-primary mx-auto" id="submit">Predict</button>
                    <button class="btn btn-primary mx-auto" id="clear">Clear</button>
                </div>
            </div>
            <div id="prediction" style="display: none; text-align: center; background-color: #25383C; color:white; height:45px; padding: 8px"></div>
                <div>
            <span class="mainerror" id="mainerror" style="color: red;font-size: 1.0em;display: none; text-align: center;">Please enter correct details</span>
</div>    
        
        </div>
    </div>
</div>
<div id="loading" style="display:none">
                <i class="fa fa-spinner fa-spin"></i> Loading...
                </div>
    <script>
        $('#clear').click(()=>{
            $('#temperature').val('');
            $('#humidity').val('');
            $('#pH').val('');
            $('#rain').val('');
            $('#prediction')[0].style.display = 'none';
            $('#mainerror')[0].style.display = 'none';
            document.getElementById('prediction').innerHTML='';
             });
        $(document).ready(()=>{
           
            document.getElementById('prediction').innerHTML='';
        });
        
        $('#submit').click(()=>{
            if($('#temperature').val()>100.000 || $('#humidity').val()>200.0000 || $('#pH').val()>14.0000 || $('#rain').val()>600 ){
                document.getElementsByClassName('mainerror')[0].style.display = 'block';
            }
            else{
            var paras = 'temp='+$('#temperature').val()+ '&humidity='+$('#humidity').val() + '&pH='+$('#pH').val() + '&rain='+$('#rain').val();
            var res;
            $.get('predict.php?'+paras, (data, status)=>{
                res = data;
            }).done(()=>{
                document.getElementsByClassName('mainerror')[0].style.display = 'none';
                $('#prediction')[0].style.display = 'block';
                $('#prediction').html(res);
                
            });
        }
        });
        
    </script>

</body>

</html>