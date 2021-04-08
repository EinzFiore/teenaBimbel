<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &rsaquo; @yield('page') &mdash; TeenaBimbel</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('stisla/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ url('stisla/assets/css/components.css')}}">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      @include('layouts/users/navigasiTop')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            <div class="card">
              @yield('content')
            </div>
          </div>
        </section>
      </div>
      @include('layouts/users/footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ url('stisla/assets/js/stisla.js') }}"></script>

    <!-- Template JS File -->
  <script src="{{ url('stisla/assets/js/scripts.js') }}"></script>
    <!-- Page Specific JS File -->
  <script src="{{ url('stisla/assets/js/page/index.js') }}"></script>
  <script>
    const state = {{Auth::user()->state}};
    const stateAkun = document.getElementById("userAccount");
    const stateForm = document.getElementById("registrasi");
    const stateTransaksi = document.getElementById("transaksi");
    const pilihJenjang = document.getElementById("pilihJenjang");
    const pilihKelas = document.getElementById("pilihKelas");
    const pilihPaket = document.getElementById("pilihPaket");
    const rek = document.getElementById("rek");
    const noRek = document.getElementById("noRek");

      if(rek){
      rek.onchange = function(){
        if(rek.value == "BCA") noRek.innerHTML="0112248920290";
        else if(rek.value == "MANDIRI") noRek.innerHTML="0023920390290";
        else if(rek.value == "BRI") noRek.innerHTML="01349029239090";
        else noRek.innerHTML="-";
      }
    }


    if(pilihJenjang){
    pilihJenjang.onchange = function(){
      if(pilihJenjang.value != "") {
        pilihKelas.removeAttribute("disabled")
      }
      else if(pilihJenjang.value == ""){
        pilihKelas.setAttribute("disabled", true)
        pilihPaket.setAttribute("disabled", true)
      }
    };
    pilihKelas.onchange = function(){
      if(pilihKelas.value != "") {
        pilihPaket.removeAttribute("disabled")
      }
      else if(pilihKelas.value == ""){
        pilihPaket.setAttribute("disabled", true)
      }
    };
    }

    if(state == 0){
      stateAkun.classList.add("wizard-step-active")
    } else if(state == 1){
      stateForm.classList.add("wizard-step-active")
    } else if(state == 2){
      stateTransaksi.classList.add("wizard-step-active")
    }
  </script>
  <script type="text/javascript">
  // Select dinamis kelas
      $(document).ready(function() {
        $('select[name="jenjang"]').on('change', function() {
            var jenjangID = $(this).val();
            if(jenjangID) {
                $.ajax({
                    url: '/getKelas/'+jenjangID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="kelas"]').empty();
                        $('select[name="kelas"]').append('<option value="">-</option>');
                        $.each(data, function(key, value) {
                            $('select[name="kelas"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="paket"]').empty();
            }
        });
    });

  // Select dinamis paket
    $(document).ready(function() {
        $('select[name="kelas"]').on('change', function() {
            var kelasID = $(this).val();
            if(kelasID) {
                $.ajax({
                    url: '/getPaket/'+kelasID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="paket"]').empty();
                        $('select[name="paket"]').append('<option value="">-</option>');
                        $.each(data, function(key, value) {
                            $('select[name="paket"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="paket"]').empty();
            }
        });
    });
</script>

</body>
</html>
