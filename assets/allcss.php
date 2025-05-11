<!-- Tailwind CSS -->
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />

<!-- Google Fonts - Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Custom Tailwind Output CSS -->
<link rel="stylesheet" href="<?php echo '/' . $host_name . '/assets/css/tailwind.output.css'; ?>">


<!-- Chart.js CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

<!-- Chart.js Animation Styles -->
<style type="text/css">
  @keyframes chartjs-render-animation {
    from { opacity: 0.99; }
    to { opacity: 1; }
  }

  .chartjs-render-monitor {
    animation: chartjs-render-animation 1ms;
  }

  .chartjs-size-monitor,
  .chartjs-size-monitor-expand,
  .chartjs-size-monitor-shrink {
    position: absolute;
    direction: ltr;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    pointer-events: none;
    visibility: hidden;
    z-index: -1;
  }

  .chartjs-size-monitor-expand > div {
    position: absolute;
    width: 1000000px;
    height: 1000000px;
    left: 0;
    top: 0;
  }

  .chartjs-size-monitor-shrink > div {
    position: absolute;
    width: 200%;
    height: 200%;
    left: 0;
    top: 0;
  }
</style>
