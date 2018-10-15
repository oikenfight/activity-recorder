import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter ({
  // mode: 'history',
  routes: [
    // home
    {
      path: '/',
      component: require('./components/Collection/Index'),
      children: [
        {
          path: '',
          component: require('./components/Collection/Record'),
          children: [
            {
              path: '',
              component: require('./components/Collection/Selector'),
            }
          ],
        },
        {
          path: '/confirmation',
          component: require('./components/Collection/Confirmation'),
        },
        {
          path: '/thanks',
          component: require('./components/Collection/Thanks'),
        },
      ],
    },
  ]
})
