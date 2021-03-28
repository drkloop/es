new Vue({
  el: '#header',
  data() {
    return {
      Icone: 0,
      menoActive: false,
      modalA: false,
      list: 1,
      PanelActive: 'gozine linkWithOutUnderLine-2 border-3',
      PanelDisActive: 'gozine linkWithOutUnderLine-2 hover-font',
      Panelkarbari: true,
      Panelagahi: false,
      barLeft:false,
      barMidel:false,
      barRight:false,
      scrolpx: 0,
    };
  },
  created() {
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
      handleScroll() {
        this.scrolpx = window.scrollY;
      },
    showIcone(id) {
      return this.Icone = id;
    },
    noneIcone() {
      return this.Icone = 0;
    },
    menoActiver(id) {
      if (id == 1) {
        return this.menoActive = true;
      } else
        return this.menoActive = false;
    },
    modal(id) {
      if (id == 1) {
        return this.modalA = true;
      } else
        return this.modalA = false;
    },
    Unbar(id1,id2,id3){
      if(id1==1){
        this.barLeft=false;
        this.barMidel=false;
        this.barRight=true;
      }else if (id2==1){
        this.barLeft=false;
        this.barMidel=true;
        this.barRight=false;
      }else if (id3==1){
        this.barLeft=true;
        this.barRight=false;
        this.barMidel=false;
      }
    },
    bar0(){
      this.barLeft=false;
      this.barRight=false;
      this.barMidel=false;
    },
    btnPanel(id) {
      if (id == 1) {
        this.PanelActive = 'gozine linkWithOutUnderLine-2 border-3 ';
        this.PanelDisActive = 'gozine linkWithOutUnderLine-2 hover-font ';
        this.Panelkarbari = true;
        this.Panelagahi = false;
      } else if (id == 2) {
        this.PanelDisActive = 'gozine linkWithOutUnderLine-2 border-3 ';
        this.PanelActive = 'gozine linkWithOutUnderLine-2 hover-font';
        this.Panelkarbari = false;
        this.Panelagahi = true;
      }
    }
  }
});
