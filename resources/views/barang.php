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
        i {
            border-radius: 50%;
            margin-right: 1vw;
        }
        .card-footer{

        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: gray;">
    <div id="vue-app">
    <?php include 'partials/nav.php'; ?>
<div class="alert alert-info alert-dismissible fade show p-2" role="alert">
   Selamat Datang {{user.data.name ? user.data.name : 'Anonim'}}
  <button style="margin-top: -9px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
    <div class="container bg-light rounded mt-2" >
        <h2 style="text-align: center;">Data Barang</h2>
        <hr>
        <br>
        <a href="/tambahbarang?barang" class="btn btn-success ms-2 mb-2">Tambah</a>
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Cari Barang" aria-label="Search">
        <button class="btn btn-primary me-4" type="submit">Cari</button>
        </form>
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead bg-dark text-light">
                <tr>
                    <th width="20">Nomor</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th width="20">Stok</th>
                    <th width="20">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(barang,index) in barangs" :key="index">
                    <td>{{index+1}}</td>
                    <td>{{barang.nama_barang}}</td>
                    <td>{{barang.harga}}</td>
                    <td>{{barang.stok}}</td>
                    <td><a :href="'/editbarang?id='+ barang.id" class="btn btn-warning text-white mb-1">Edit</a><br>
                        <button @click="HapusBarang(barang.id)"class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        
        <hr>
        <!-- card -->
<div class="row row-cols-1 row-cols-md-4 g-4">
  <div v-for="(barang,index) in barangs" :key="index" class="col">
    <div class="card h-100 shadow">
      <img width="200" height="200" src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{barang.nama_barang}}</h5>
        <p class="card-text">Harga: {{barang.harga}}</p>
        <p class="card-text">Stok: {{barang.stok}}</p>
      </div>
      <div class="card-footer d-flex justify-content-center">
        <i class="fa fa-search fa-3 bg-info p-3 text-light" aria-hidden="true"></i>
        <a :href="'/editbarang?id='+ barang.id"><i class="fa fa-edit fa-3 bg-warning p-3 text-light" aria-hidden="true"></i></a>
        <i @click="HapusBarang(barang.id)" class="fa fa-trash fa-3 bg-danger p-3 text-light" aria-hidden="true"></i>
      </div>
    </div>
  </div>
</div>
       <?php include 'partials/footer.php'; ?>
    </div>
</div>
    <!-- end-vueapp -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
<script>
    var vm = new Vue({
        el: '#vue-app',
        data: {
            user: '',
            barangs : null
        },
        methods: {
            HapusBarang(id){
                console.log(id)
                if (confirm("Anda Yakin?")) {
                    $.ajax({
                url:"/api/barang/"+id,
                type:"delete",
                // data:{0
                //    id:id
                // },
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
            EditBarang(id){
                console.log(id)
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
