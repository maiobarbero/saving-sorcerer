import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy'



import AuthLayout from "./Layouts/AuthLayout.vue"

createInertiaApp({
  resolve: async name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = await pages[`./Pages/${name}.vue`]

    page.default.layout = page.default.layout || AuthLayout
    
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el)
  },
  title: title => `Saving Sorcerer | ${title}`,
  progress: {
    delay: 250,
    color: '#9333ea',
    includeCSS: true,
    showSpinner: true,
  }
})