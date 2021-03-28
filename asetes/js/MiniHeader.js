new Vue({
  el: '#Mini',
  data() {
    return {
      menoAc: false,
      scrollpx: 0,
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
      this.scrollpx = window.scrollY;
    },
    menoA(id) {
      if (id == 1) {
        return this.menoAc = true;
      } else
        return this.menoAc = false;
    },
  }
});
