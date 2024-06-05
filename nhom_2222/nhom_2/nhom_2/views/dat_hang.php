<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Payment Successful</title>
</head>
<style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .container {
    max-width: 600px;
    height: 600px;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: relative;
  }

  h1 {
    margin-top: 60px;
    text-align: center;
    color: #4caf50;
  }

  .thanh_cong i {
    display: flex;
    justify-content: center;
    margin: 20px;
    font-size: 7em;
    color: #4caf50;
  }

  section {
    margin-top: 20px;
    text-align: center;
  }

  .action a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4caf50;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .action a:hover {
    background-color: #45a049;
  }

  #timer-container {
    text-align: center;
    position: absolute;
    bottom: 110px;
    padding: 16px 0px;
    left: 50%;
    transform: translateX(-50%);
    width: 90px;
    height: 90px;
    background-color: transparent;
    border: 2px solid #4caf50;
    border-radius: 50%; 
  }

  #timer {
    font-size: 1.5em;
    color: #333;
    line-height: 60px;
  }
</style>
<body>

  <div class="container">

    <h1>Thanh Toán Thành Công</h1>

    <div class="thanh_cong">
      <i class="fa-solid fa-circle-check"></i>
    </div>

    <section>
      <p>Cảm ơn bạn đã thanh toán. Giao dịch của bạn đã thành công. Sau 5 giây sẽ tự động chuyển về trang chủ!
</p>
    </section>

    <!-- <section class="action">
      <a href="index.php">Tiếp tục mua hàng</a>
    </section> -->

    <div id="timer-container">
      <div id="timer"></div>
    </div>


  </div>

  <script>
    var secondsLeft = 5;

    function updateTimer() {
      document.getElementById('timer').innerText = secondsLeft + '.0 S';
    }

    function countdown() {
      if (secondsLeft > 0) {
        updateTimer();
        secondsLeft--;
      } else {
        window.location.href = 'index.php';
      }
    }

    var timerInterval = setInterval(countdown, 1000);

    document.addEventListener('mousemove', function() {
  secondsLeft = 5;
  updateTimer();
});

document.addEventListener('click', function() {
  secondsLeft = 5;
  updateTimer();
});


    updateTimer();
  </script>

</body>
</html>
