<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .nav-link:hover{
            color: white;
        }
    </style>
</head>

<body style="background-color: #D4D4D4;">
    <div id="vue-app">
    <?php include 'partials/nav.php'; ?>
<div class="alert alert-info alert-dismissible fade show p-2" role="alert">
   Selamat Datang {{user.data.name ? user.data.name : 'Anonim'}}
  <button style="margin-top: -9px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
    <div class="container bg-light rounded mt-2" >
        <h4 style="text-align: left;">Tambah Barang</h4>
        <hr>
        <div style="background-color: #D4D4D4;border:1px solid lightgray;" class="container me-3 shadow p-3 rounded">
        <div class="mb-3">
  <label  class="form-label ">Nama Barang</label>
  <input v-model="namabarang"type="text" class="form-control" id="namabarang" placeholder="Masukkan Nama Barang">
  <label  class="form-label ">Harga</label>
  <input v-model="harga" type="text" class="form-control" id="harga" placeholder="Masukkan Harga Barang">
  <label  class="form-label ">Stok</label>
  <input v-model="stok" type="number" class="form-control" id="stok" placeholder="Masukkan Stok Barang">
</div>
<p>{{namabarang}}</p>
<p>{{harga}}</p>
<p>{{stok}}</p>
<button @click="TambahBarang" class="btn btn-success ms-2 mb-2">Tambah</button>
</div>
        <hr>
       <?php include 'partials/footer.php'; ?>
    </div>
</div>
    <!-- end-vueapp -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
<script>
    // $(document).ready(function() {
    //      $( '#harga' ).mask('000.000.000', {reverse: true});
    // } );
    var vm = new Vue({
        el: '#vue-app',
        data: {
            user: '',
            namabarang:'',
            harga: '',
            stok:null
        },
        methods: {
            TambahBarang(){
                $.ajax({
                url:"/api/barang",
                type:"post",
                data:{
                   nama_barang:this.namabarang,
                    harga:this.harga,
                    stok:this.stok
                },
                success:(res) => {
                    // this.barangs = res.barang
                    // console.log(res.barang)
                    alert("Sukses")
                    window.location.href = "http://127.0.0.1:8000/barang?barang";
                    // localStorage.setItem('user', JSON.stringify(response.data.data))
                    // localStorage.setItem('token', JSON.stringify(response.data.token))
                    // localStorage.setItem('LoggedUser', true)
                },
                error: () => {
                   alert("GAGAL")
                }

            })
            }
        },
        filters:{
                format_uang(value,currency){
                    var formatter = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: currency,
                                    minimumFractionDigits: 2,
                    });
                    return formatter.format(value)
                }
            },
        mounted() {
            this.user = JSON.parse(localStorage.getItem("user"));
            $.ajax({
                url:"/api/barang",
                type:"get",
                // data:{
                //    email:this.email,
                //     password:this.password
                // },
                success:(res) => {
                    this.barangs = res.barang
                    console.log(res.barang)
                    // window.location.href = "http://127.0.0.1:8000/beranda";
                    // localStorage.setItem('user', JSON.stringify(response.data.data))
                    // localStorage.setItem('token', JSON.stringify(response.data.token))
                    // localStorage.setItem('LoggedUser', true)
                },
                error: () => {
                   alert("GAGAL")
                }

            })
        }
    });
</script>

</html>
