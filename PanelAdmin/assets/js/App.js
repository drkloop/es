// import Vue from 'vue';
// import CKEditor from 'ckeditor4-vue';
//urls
const Url = 'http://es.local/';
const UrlOfsite = Url + 'panelAdmin/page/DatabaseAndJson';
const url1 = UrlOfsite + '/thabtnamiha.php';
const url2 = UrlOfsite + '/agahiha.php';
const url3 = UrlOfsite + '/visited.php';
const url4 = UrlOfsite + '/UserInfo.php';
const url5 = UrlOfsite + '/nemodar.php';
const url6 = UrlOfsite + '/er.php';
const url7 = UrlOfsite + '/users.php';
const url8 = UrlOfsite + '/insert.php';
const url9 = UrlOfsite + '/comments.php';
const url10 = UrlOfsite + '/sarasari-ag.php';
const url11 = UrlOfsite + '/mardomi.php';
// end url

//comonet that use
Vue.component('job', {
  template: '',
  created() {
    this.Sucses();
  },
  methods: {
    Sucses() {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons.fire({
        title: 'آيا مطمئن هستيد برای خروج؟',
        text: 'در صورت موافقت از پنل مدیریت خارج و به صفحه اول سایت بازمیگردید',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '!بله',
        cancelButtonText: '!خیر',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.replace(Url + 'Out');
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
          window.location.replace(Url + 'panelAdmin');
        }
      });
    }
  }
});
var ComponentA = {
  props: [
    'hara', 'harb', 'harc', 'hard', 'hare', 'harf', 'harh', 'datea', 'dateb', 'datec', 'dated', 'datee', 'datef', 'dateg'
  ],
  extends: VueChartJs.Line,
  data() {
    return {
      gradient: null,
      gradient2: null,
      visited: []
    };
  },
  mounted() {
    // this.gradient = this.$refs.canvas
    //     .getContext("2d")
    //     .createLinearGradient(0, 0, 0, 450);
    this.gradient2 = this.$refs.canvas
        .getContext('2d')
        .createLinearGradient(0, 0, 0, 450);
    //
    // this.gradient.addColorStop(0, "rgba(255, 0,0, 0.5)");
    // this.gradient.addColorStop(0.5, "rgba(255, 0, 0, 0.25)");
    // this.gradient.addColorStop(1, "rgba(255, 0, 0, 0)");

    this.gradient2.addColorStop(0, 'rgba(0, 231, 255, 0.9)');
    this.gradient2.addColorStop(0.5, 'rgba(0, 231, 255, 0.25)');
    this.gradient2.addColorStop(1, 'rgba(0, 231, 255, 0)');

    this.renderChart(
        {
          labels: [
            this.datea,
            this.dateb,
            this.datec,
            this.dated,
            this.datee,
            this.datef,
            this.dateg
          ],
          // {
          //   label: "بازديد هفته قبل",
          //   borderColor: "#FC2525",
          //   pointBackgroundColor: "white",
          //   borderWidth: 1,
          //   pointBorderColor: "white",
          //   backgroundColor: this.gradient,
          //   // h : hafte , r: rooz ,ex: ha : hafe A ,ra:rooz a
          //   data: [this.hbra, this.hbrb, this.hbrc, this.hbrd, this.hbre, this.hbrf, this.hbrh]
          // },
          datasets: [
            {
              label: 'بازديد هفته',
              borderColor: '#76d5ec',
              pointBackgroundColor: 'white',
              pointBorderColor: 'white',
              borderWidth: 2,
              backgroundColor: this.gradient2,
              data: [this.hara, this.harb, this.harc, this.hard, this.hare, this.harf, this.harh]
            }
          ]
        },
        {responsive: true, maintainAspectRatio: false}
    );
  }
};
//end uses
var INPUT={
 props:['option','flag'],
  data() {
    return {
      editor: ClassicEditor,
      editorData: '<p>متن پاسخ خود را در اينجا بنويسيد.</p>',
      onEditorInput: {},
      editorConfig: {
        language : "fa",
        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            "link",
            "blockQuote",
            "|",
            "indent",
            "outdent",
            "|",
            'bulletedList',
            'numberedList',
            '|',
            'insertTable',
            '|',
            'undo',
            'redo',
          ]
        },
        table: {
          contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        },
      },
    }
  },
  methods: {
    remove() {
      this.$emit('remove');
    }
  },
  template:`
<div>
  <br>
  <div v-if="flag.title=='title'">
    <h3> سرتيتر :</h3>
    <div class="row">
      <div class="col-10">
        <input type="text" class="form-control" placeholder="سرتیتر خود را در اینجا وارد کنید" v-model="option.title">
      </div>
      <div class="col-2">
        <a class="btn btn-outline-danger" href="#" @click.prevent="remove"> X</a>
      </div>
    </div>
  </div>
  <div v-if="flag.title=='box'">
    <h3> متن داخل باكس : </h3>
    <div class="row">
      <div class="col-10">
        <ckeditor :editor="editor" v-model="option.box" @input="onEditorInput" :config="editorConfig"></ckeditor>
      </div>
      <div class="col-2">
        <a href="#" class="btn btn-outline-danger"
                @click.prevent="remove"> X
        </a>
      </div>
    </div>
  </div>
  <div v-if="flag.title=='mtn'">
    <h3> متن  : </h3>
    <div class="row">
      <div class="col-10">
        <ckeditor :editor="editor" v-model="option.mtn" @input="onEditorInput" :config="editorConfig" ></ckeditor>
      </div>
      <div class="col-2">
        <a href="#" class="btn btn-outline-danger"
                @click.prevent="remove"> X
        </a>
      </div>
    </div>
  </div>
  <hr>
</div>
  `
}

//main component
const Advertise = {
  template: '#Advertise',
  components: {
      'ipt': INPUT,
  },
  data() {
    return {
      mardomi:false,
      sarasari:false,
      AddSarasari:false,
      ShowSarasari:false,
      ShowMardomi:false,
      agahi:true,
      link:"",
      Options:[],
      AgahiSarasari:[],
      AgahiMardomi:[],
      flag:[],
      title1:'',
      title2:'',
      kholase:'',
    };
  },
  mounted() {
   // this.insertSarasari();
    this. getAgahiSarasari();
    this. getAgahiMardomi();

  },
  methods: {
    deleteADver(id,func) {
      Swal.fire({
        title: 'آيا مطمئن هستيد كه ميخواهيد اين آگهي  را حذف كنيد ؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'نه منصرف شدم',
        confirmButtonText: 'بله مطمئنم پاكش كن'
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteAdv(id,func);
          Swal.fire(
              '!پاك شد',
              '.آگهي مورد نظر حذف شد',
              'success'
          );
          window.location.replace(Url + 'panelAdmin');
        }
      });
    },
    deleteAdv(id,func) {
      axios.post(url8, {
        action: 'deleteAver',
        func:func,
        Id: id
      })
          .then((response) => {
            console.log(id);
          })
          .catch(e => {
            console.log(error.response.data);
          });
    },
    getAgahiSarasari() {
      axios.get(url10)
          .then(response => {
            this.AgahiSarasari = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    geToPageSararari(Id){
      this.ShowSarasari=true;
    return  this.link=  Url + 'estekhdamSarasari?id='+Id ;
    },
    geToPageMardomi(Id){
      this.ShowMardomi=true;
    return  this.link=  Url + 'adver?id='+Id ;
    },

    getAgahiMardomi() {
      axios.get(url11)
          .then(response => {
            this.AgahiMardomi = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    Sucses() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        icon: 'success',
        title: 'آگهي سراسري به درستي منتشر شد .'
      });
    },
    danger() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        icon: 'error',
        title: 'فیلد های ستاره دار الزامی هستند.'
      });
    },
    insertSarasari() {
      if ((this.title1!='' && this.title2!='' &&this.kholase!='')){
      axios.post(url8, {
        action: 'sarasari',
        Options:this.Options,
        title1:this.title1,
        title2:this.title2,
        kholase:this.kholase,
      })
          .then((response) => {
            console.log('ok');
            this.Sucses();
            this.AddSarasari=false;
          })
          .catch(e => {
            console.log(error.response.data);
          });
      }else {
        this.danger();
      }
    },
    addOP(act){
      switch (act){
        case 'title':
       this.flag.push({title:'title'});
        this.Options.push({title: ''}); // what to push unto the rows array?
        break;
        case 'box':
          this.flag.push({title:'box'});
        this.Options.push({box: ''}); // what to push unto the rows array?
        break;
        case 'mtn':
          this.flag.push({title:'mtn'});
        this.Options.push({mtn: ''}); // what to push unto the rows array?
        break;
      }
    },
    removeOP(index){
      this.Options.splice(index, 1); // what to push unto the rows array?
      this.flag.splice(index, 1); // what to push unto the rows array?
    },
    ShowAdv(func){
      this.agahi=false;
      switch (func){
        case 'sarasari':
          this.sarasari=true;
          break;
          case 'mardomi':
          this.mardomi=true;
          break;
      }
    },
  }
};
const NotfoundComponent = {
  template: '#NotFound'
};
const users = {
  template: '#Users',
  data() {
    return {
      Users: [],
      showDatails: true,
      ShowEdit: true,
      ShowRemove: true,
      user: [],
      Id: '',
      Email: '',
      Madrak: '',
      Name: '',
      Ostan: '',
      Phone: '',
      Reshte: '',
      Semat: '',
      Sex: '',
      Shaher: '',
      Password: '',
      errors: []
    };
  },
  mounted() {
    this.getUsers();
    this.User();
    this.getTheUser();
    this.user;
    this.editUser();
    this.deleteUser();
  },
  created() {

  },
  methods: {
    delete(id) {
      Swal.fire({
        title: 'آيا مطمئن هستيد كه ميخواهيد اين كاربر را حذف كنيد ؟',
        text: 'در صورت حذف كاربر تمام اطلاعات اين كاربر نيز پاك مي شود',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'نه منصرف شدم',
        confirmButtonText: 'بله مطمئنم پاكش كن'
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteUser(id);
          Swal.fire(
              '!پاك شد',
              '.كاربر مورد نظر حذف شد',
              'success'
          );
          window.location.replace(Url + 'panelAdmin');
        }
      });
    },
    removeUser(id) {
      this.delete();
    },
    Sucses() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        icon: 'success',
        title: 'اطلاعات به درستي ثبت شد'
      });
    },
    deleteUser(id) {
      axios.post(url8, {
        action: 'deleteUser',
        Id: id
      })
          .then((response) => {
            console.log(id);
          })
          .catch(e => {
            console.log(error.response.data);
          });
    },
    editUser() {
      axios.post(url8, {
        action: 'User',
        Id: this.Id,
        Email: this.Email,
        Madrak: this.Madrak,
        Name: this.Name,
        Ostan: this.Ostan,
        Phone: this.Phone,
        Reshte: this.Reshte,
        Semat: this.Semat,
        Sex: this.Sex,
        Shaher: this.Shaher,
        Password: this.Password
      })
          .then((response) => {
            this.InfoUser = response.data;
            this.Sucses();
            this.ShowEdit = true;
          })
          .catch(e => {
            console.log(error.response.data);
          });
    },
    User(event, fnc) {
      element = event.currentTarget;
      var id = element.getAttribute('href');
      this.getTheUser(id);
      switch (fnc) {
        case 'datails':
          this.showDatails = false;
          break;
        case 'edit':
          this.ShowEdit = false;
          break;
        case 'remove':
          this.delete(this.user.Id);
          break;
      }
    },
    getTheUser(id) {
      this.user = this.Users[id];
      return this.user;
    },
    getUsers() {
      axios.get(url7)
          .then(response => {
            this.Users = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    }
  }
};
const errors = {
  template: '#errors',
  data() {
    return {
      text:'',
      editor: ClassicEditor,
      editorData: '<p>متن پاسخ خود را در اينجا بنويسيد.</p>',
      onEditorInput: {},
      editorConfig: {
        language : "fa",
        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            "link",
            "blockQuote",
            "|",
            "indent",
            "outdent",
            "|",
            'bulletedList',
            'numberedList',
            '|',
            'insertTable',
            '|',
            'undo',
            'redo',
          ]
        },
        table: {
          contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        },
      },
      errors: [],
      showList: true,
      ER: []
    };
  },
  mounted() {
    this.listErfuncs();
    ComponentB.data().showList;

    function showDetails(animal) {
      var animalType = animal.getAttribute('data-animal-type');
      alert('The ' + animal.innerHTML + ' is a ' + animalType + '.');
    }
  },
  created() {
    this.getErrors();
  },
  methods: {
    Sucses() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        icon: 'success',
        title: 'پاسخ شما به درستي ارسال شد .'
      });
    },
    danger() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
      });
      Toast.fire({
        icon: 'error',
        title: 'حداقل بايد پاسخ شما داراي 15 كاراكتر باشد .'
      });
    },
    SendMessage(id) {
      //بايد اينجا رو درست كنم فردا
      if ((this.text.length>15)){
        axios.post(url8, {
          action: 'pasokhEr',
          text:this.text,
          id:id
        })
            .then((response) => {
              console.log('ok');
              this.Sucses();
              window.location.replace(Url + 'panelAdmin');
            })
            .catch(e => {
              console.log(error.response.data);
            });
      }else {
        this.danger();
      }
    },



    listErfuncs(event) {
      element = event.currentTarget;
      id = element.getAttribute('href');
      this.showList = false;
      this.getTheEr(id);
    },
    getTheEr(id) {
      this.ER = this.errors[id];
      return this.ER;
    },
    getErrors() {
      axios.get(url6)
          .then(response => {
            this.errors = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    }
  }
};
const exit = {
  template: '#exit',
  components: {}
};
const HomeComponent = {
  template: '#dashboard',
  components: {
    'line-chart': ComponentA
  },
  data() {
    return {
      Users: [],
      adverties: [],
      visited: [],
      visit: [],
      sessions: [],
      data1: 10
    };
  },
  created() {
    this.getUserCount();
    this.getUseradverties();
    this.getVisited();
    this.getVisit();
    this.getsession();
    this.setTheVisit();
  },
  methods: {
    setTheVisit() {
      this.data1 = this.visit[0].Bazdid;
      console.log(this.visit[0]);
    },
    getVisit() {
      axios.get(url5)
          .then(response => {
            this.visit = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    getUserCount() {
      axios.get(url1)
          .then(response => {
            this.Users = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    getUseradverties() {
      axios.get(url2)
          .then(response => {
            this.adverties = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    getVisited() {
      axios.get(url3)
          .then(response => {
            this.visited = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    getsession() {
      axios.get(url4)
          .then(response => {
            this.sessions = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    }
  }

};
Vue.use(CKEditor);
const Comment = {
  template: '#comment',
  data() {
    return {
      editor: ClassicEditor,
      editorData: '<p>متن پاسخ خود را در اينجا بنويسيد.</p>',
      onEditorInput: {},
      editorConfig: {
        language : "fa",
        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            "link",
            "blockQuote",
            ,"|","indent","outdent","|",
            'bulletedList',
            'numberedList',
            '|',
            'insertTable',
            '|',
            'undo',
            'redo',
          ]
        },
        // 'imageUpload',
        // image: {
        //   toolbar: [
        //     'imageStyle:full',
        //     'imageStyle:side',
        //     '|',
        //     'imageTextAlternative'
        //   ]
        // },
        table: {
          contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        },
      },
      Comments: [],
      comment: [],
      id: 1,
      showDatails:true,
      ShowAns :true,
      adding:0
    };
  },
  created() {
    // this.ThePage(1);
    this.getThePage();
  },
  mounted() {
    this.ThePage();
    this.getComments();
    this.getTheComment();
    this.getThePage();
    this.deleteCommentRep();
    this.comments;
  },
  methods: {
    SucsesRep(){
      this.ShowAns=true;
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
        title: 'پاسخ شما به ديدگاه مورد نظر به درستی ثبت شد.'
      })
    },
    deleteOptins(event,act){
      element = event.currentTarget;
      var id = element.getAttribute('href');
      var action= act;
        Swal.fire({
          title: 'آيا مطمئن هستيد كه ميخواهيد اين دیدگاه را حذف كنيد ؟',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'نه منصرف شدم',
          confirmButtonText: 'بله مطمئنم پاكش كن'
        }).then((result) => {
          if (result.isConfirmed) {
            this.deleteCommentRep(id,action)
            Swal.fire(
                '!پاك شد',
                '.دیدگاه مورد نظر حذف شد',
                'success'
            );
            window.location.replace(Url + 'panelAdmin');
          }
        });
    },
    deleteCommentRep(id,act) {
      axios.post(url8, {
        action: act,
        Id: id
      })
          .then((response) => {
            console.log(id);
          })
          .catch(e => {
            console.log(error.response.data);
          });
    },
    SendComment(event) {
      element = event.currentTarget;
      var id = element.getAttribute('href');
      axios.post(url8, {
        action: "Comment",
        comment:this.editorData,
        Name:'مدير سايت',
        CommentId:id,
        Email:"Admin@admin.com"
      })
          .then((response) => {
            console.log("ok");
          })
          .catch(e => {
            console.log(error.response.data);
          });
    },
    getComments() {
      axios.get(url9)
          .then(response => {
            this.Comments = response.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    getThePage() {
      var page = 10 * this.id;
      var i = ((this.id - 1) * 10);
      this.adding=i;

      return this.Comments.slice(i, page);
    },
    paginationComments() {
      var length = this.Comments.length;
     var num= Number(((length/10)+0.4).toFixed())
      console.log(num);
      return num;
    },
    isActive(id) {
      if (id == this.id) {
        return 'page-link ActiveBtn';
      }
      return 'page-link ';

    },
    Next() {
      if (this.id != this.paginationComments()) {
        this.id = (this.id + 1);
      }
    },
    Previous() {
      if (this.id != 1) {
        this.id = (this.id - 1);
      }
    },
    ThePage(id = null) {
      if (id == null) {
        id = 1;
      }
      this.id = id;
    },
    Comm(event, fnc) {
      element = event.currentTarget;
      var id = element.getAttribute('href');
      this.getTheComment(id);
      switch (fnc) {
        case 'details':
          this.showDatails = false;
          break;
        case 'ans':
          this.ShowAns = false;
          break;
        case 'delete':
          // this.delete(this.user.Id);
          break;
      }
    },
    getTheComment(i){
       this.comment=this.Comments[i];
      return  this.comment;
    }
  }
};

//route
const routes = [

  {
    path: '/panelAdmin',
    component: HomeComponent
  },
  {
    path: '/comments',
    component: Comment
  },
  {
    path: '/advertise',
    component: Advertise
  },
  {
    path: '/errors',
    component: errors
  },
  {
    path: '/users',
    component: users
  },
  {
    path: '/exit',
    component: exit
  },
  {
    path: '*',
    component: NotfoundComponent
  }
];

//main asli
const router = new VueRouter({
  routes,
  mode: 'history'
});

//
var vm = new Vue({
  el: '#wraper',
  router,
  data: {
    showdash: 0,

  },

});