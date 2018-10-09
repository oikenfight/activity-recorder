import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter ({
  // mode: 'history',
  routes: [
    // home
    {
      path: '/',
      component: require('./components/collection/Index'),
      children: [
        {
          path: '',
          component: require('./components/collection/Record'),
          children: [
            {
              path: '',
              component: require('./components/collection/Selector'),
            }
          ],
        },
        {
          path: '/confirmation',
          component: require('./components/collection/Confirmation'),
        },
        {
          path: '/thanks',
          component: require('./components/collection/Thanks'),
        },
      ],
    },
  ]
})
