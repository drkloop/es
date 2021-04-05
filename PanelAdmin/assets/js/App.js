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
  created(){

  },
  methods: {
    delete(id){
          Swal.fire({
            title: 'آيا مطمئن هستيد كه ميخواهيد اين كاربر را حذف كنيد ؟',
            text: "در صورت حذف كاربر تمام اطلاعات اين كاربر نيز پاك مي شود",
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
              )
              window.location.replace(Url + 'panelAdmin');
            }
          })
    },
    removeUser(id){
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
        Id:id,
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
const AboutComponent = {
  template: '<h1>About</h1>'
};
const routes = [
  {
    path: '/panelAdmin',
    component: HomeComponent
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

const router = new VueRouter({
  routes,
  mode: 'history'
});
Vue.use(CKEditor);


var vm = new Vue({
  el: '#wraper',
  router,
  data: {
    showdash: 0,
    editor: ClassicEditor,
    editorData: '<p>Content of the editor.</p>',
    onEditorInput: {},
    editorConfig: {
      // The configuration of the editor.
    }

  }


});