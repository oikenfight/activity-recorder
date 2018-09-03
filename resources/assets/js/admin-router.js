import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter);

export default new VueRouter ({
  routes: [
    // home
    {
      path: '/',
      component: require('./components/admin/Index'),
      children: [],
    },
  ]
})
