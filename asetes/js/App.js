// Vue.config.productionTip = false;
// Vue.config.silent = true;

Vue.component('job', {
    template: '',
    created() {
        this.Sucses();
    },
    methods: {
        Sucses() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'شما به درستی در سایت ثبت نام شدید'
            })
        }
    }
});
Vue.component('paschen', {
    template: '',
    created() {
        this.Sucses();
    },
    methods: {
        Sucses() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'پسورد شما به درستي عوض شد . شما ميتوانيد با پسورد جديد وارد سايت شويد.'
            })
        }
    }
});
Vue.component('forget', {
    template: '',
    created() {
        this.Sucses();
    },
    methods: {
        Sucses() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'ايميلي حاوي كد بازيابي رمز عبور براي شما ارسال شد لطفا ايميل خود را چك كنيد و با تغيير رمز مي توانيد با رمز جديد وارد سايت شويد'
            })
        }
    }
});
Vue.component('validate', {
    template: ""
    ,
    created() {
        this.Sucses();
    },
    methods: {
        Sucses() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'ايميل به درستي براي شما ارسال شد.'
            })
        }
    }
});
Vue.component('copy', {
    template: '',
    created() {
        this.Sucses();
    },
    methods: {
        Sucses() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'لينك شما به درستي كپي شد'
            })
        }
    }
});
Vue.component('copylink', {
    template: `
    <button @click="copyUrl" class="btn btn-block btn-light"><img src="./asetes/img/copylink.png" style="width: 30px"></button>
  `,
    data() {
        return {

        }
    },
    props: ["link_url"],
    methods: {
        copyUrl() {

            const el = document.createElement('textarea');
            el.value = this.link_url;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            const selected = document.getSelection().rangeCount > 0 ? document.getSelection().getRangeAt(0) : false;
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            if (selected) {
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(selected);
            }
        }
    }
});
Vue.component('Comment', {

    data() {
        return {

        }
    },
    template: `
 <form action="./nazarat" method="post">
    <div class="row" style="margin-right: 10px ">
      <label for="name_nazarat" class="label-border col-3">نام</label>
      <input type="text" id="name_nazarat" name="Name" class="form-control col-8" required >
      <div class="col-1"></div>
    </div>
    <div class="row" style="margin-right: 10px ">
      <label for="em_nazarat" class="label-border col-3">ايميل</label>
      <input patern="[a-zA-Z0-9-آابپتثجچحخدذرزژسشصضطظعغفق  کگلمنوهی]" type="email" id="em_nazarat" name="Email" class="form-control col-8" required >
      <div class="col-1"></div>
    </div>
    <div class="form-group">
      <label for="texteria_nazarat" class="label-didgah">دیدگاه</label>
      <textarea class="form-control" id="texteria_nazarat" name="Nazar" rows="3" required ></textarea>
    </div>
    <hr>
    <button type="submit" class="btn btn-block btn-info ">ثبت نظر</button>
  
  </form>
  `,

});
Vue.component('Commentrep', {
    props: ["idcoment"],
    data() {
        return {

        }
    },
    template: `
 <form action="./nazarat" method="post">
    <div class="row" style="margin-right: 10px ">
      <label for="name_nazarat" class="label-border col-3">نام</label>
      <input type="text" id="name_nazarat" name="Name" class="form-control col-8" required >
      <input type="hidden"  name="IdComent" class="form-control col-8" :value="idcoment" :placeholder="idComent"  >
      <div :v-if="idcoment!='0'">
      <input type="hidden"  name="Rep" class="form-control col-8" value="1"  >
      </div>
      <div class="col-1"></div>
    </div>
    <div class="row" style="margin-right: 10px ">
      <label for="em_nazarat" class="label-border col-3">ايميل</label>
      <input type="email" id="em_nazarat" name="Email" class="form-control col-8" required >
      <div class="col-1"></div>
    </div>
    <div class="form-group">
      <label for="texteria_nazarat" class="label-didgah">دیدگاه</label>
      <textarea class="form-control" id="texteria_nazarat" name="Nazar" rows="3" required ></textarea>
    </div>
    <hr>
    <button type="submit" class="btn btn-block btn-info ">ثبت نظر</button>
  
  </form>
  `,

});

Vue.component('accsu', {
    template: '',
    created() {
        this.Sucses();
    },
    methods: {
        Sucses() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'خوش آمدید :)  شما وارد سایت شدید',
            })
        }
    }
});
Vue.component('eremail', {
    template: '',
    created() {
        this.error();
    },
    methods: {
        error() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'خطا! ایمیل شما در سایت قبلا ثبت شده است'
            })
        }
    }
});
Vue.component('erphone', {
    template: '',
    created() {
        this.error();
    },
    methods: {
        error() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'خطا!شماره تلفن شما قبلا در سایت ثبت شده است'
            })
        }
    }
});
Vue.component('erthabt', {
    template: '',
    created() {
        this.error();
    },
    methods: {
        error() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: 'هشدار! اول باید ثبت نام کنید تا وارد  صفحة مورد نظر شوید'
            })
        }
    }
});
Vue.component('ervorod', {
    template: '',
    created() {
        this.error();
    },
    methods: {
        error() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: 'هشدار! اول باید ثبت نام کنید تا وارد  صفحة مورد نظر شوید'
            })
        }
    }
});
Vue.component('eracc', {
    template: '',
    created() {
        this.error();
    },
    methods: {
        error() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'خطا! رمز یا ایمیل خود را درست وارد نکردید'
            })
        }
    }
});
const u="http://es.local/model/";
const url = u+"NazaratJson.php";
const urli = u+"NazaraReptJson.php";

const vm = new Vue({
    el: '#App',

    data() {
        return {
            notif: true,
            MSG_NOTIF: '',
            pass1: "",
            pass2: "",
            confirm: '',
            flag: 0,
            RePass1:'',
            RePass2:'',
            posts: [],
            Nazar: [],
           replyei: [],
            results: [],
            search: "",
            Num: 5,
            Next: 5,
            In: 0,
            NotFound: 0,
            btndisabled: 'disabled',
            tedadNazar: 0,
            btn: 0,
            neshan: 0,
            list: [],
            btnActive: "btn btn-secondary btnActive",
            btnNotActive: "btn btn-secondary",
            flagBtn: 0,
            btnCopy: false,
            Reply: 0,
            ZaShare: 0,
            Zago: 0,
            width: null,
            disabled: 1,
            captcha:"",
        };
    },
    created() {
        this.SHow(0);
        this.getPosts();
        this.TedadNazarat;
        // this. btnIdToken(0);
        this.getNazarat();
        this.getNazar();

    },

    mounted() {
        setTimeout(() => {
            this.notifi();
        }, -3000)
        this.ShowMenuPanel();
        //     this.ForNum();
        this.zabdarshare;
        this.zabdargo;

    },

    methods: {
        checkCaptcha(cap){
           if (this.captcha==cap){
              return  this.disabled=0
           } else return  this.disabled=1;
        },
        validateBeforeSubmit(e) {
            if (this.errors.any()) {
                // Prevent the form from submitting
                e.preventDefault();
            }
        },
        ShowMenuPanel() {
            this.width = window.innerWidth;
            return this.width;
        },
        ForNum() {
            if (this.Num <= 1) {
                this.Num == 1;
            }
        },
        countOfNazar(count) {
            this.tedadNazar = count;
        },

        getPosts() {
            axios.get(url)
                .then(response => {
                    this.posts = response.data;
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        },
        getNazar() {
            axios.get(urli)
                .then(response => {
                    this.replyei = response.data;
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        },
        getNazarat() {
            axios.get(url)
                .then(response => {
                    this.results = response.data;
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        },

        Coment(id) {
            if (id == 0) {
                this.flag = 0;
            } else this.flag = id;
        },
        SHow(id) {
            if (this.flag == id) {
                return true;
            } else
                return false;
        },
        notifi() {
            return this.notif;
        },
        btnIdToken(id) {
            if (id < 0) {
                this.flagBtn = 0;
            } else if (id >= this.TedadNazarat) {
                var Tedad;
                Tedad = this.TedadNazarat;
                --Tedad;
                this.flagBtn = Tedad;
            } else {
                this.flagBtn = id;
            }
            return this.flagBtn;
        },

    },

    computed: {

        zabdarshare() {
            if (this.ZaShare == 0) {
                return false;
            } else {
                return true;
            }
        },
        zabdargo() {
            if (this.Zago == 0) {
                return false;
            } else {
                return true;
            }
        },
        pageIn() {
            return this.In = this.flagBtn * this.Num;
        },
        pageNex() {
            if (this.pageIn == 0) {
                return this.Next = this.Num;
            } else {
                return this.Next = this.In + this.Num;
            }
        },
        Nazarat() {
            return this.results.slice(this.pageIn, this.pageNex);
        },
        TedadNazarat() {
            var val;
            this.btn = this.Reply / this.Num;
            this.neshan = this.btn + 0.4999;
            val = this.neshan.toFixed();
            return val;
        },
        btnFor() {
            for (var i = 0; i <= this.TedadNazarat * 4; i++) {
                this.list[i] = "e";
            }
            for (var i = 0; i < this.TedadNazarat; i++) {
                this.list[i] = i;
            }
            return this.list;
        },

        filtredPosts() {
            return this.posts.filter((post) => {
                return post.Mtn.match(this.search.toLowerCase());
            });
        },
        resultCount() {
            return this.results && this.results.length
        }
    },

});