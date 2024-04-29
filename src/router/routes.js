import DashboardLayout from "@/layout/dashboard/DashboardLayout.vue";
// GeneralViews
import NotFound from "@/pages/NotFoundPage.vue";
// import { component } from "vue/types/umd.js";

// Admin pages
const Dashboard = () =>
  import(/* webpackChunkName: "dashboard" */ "@/pages/Dashboard.vue");
const Profile = () =>
  import(/* webpackChunkName: "common" */ "@/pages/Admin/Profile.vue");
const Notifications = () =>
  import(/* webpackChunkName: "common" */ "@/pages/Notifications.vue");
const Icons = () =>
  import(/* webpackChunkName: "common" */ "@/pages/Icons.vue");
const Maps = () => import(/* webpackChunkName: "common" */ "@/pages/Maps.vue");
const Typography = () =>
  import(/* webpackChunkName: "common" */ "@/pages/Typography.vue");
const TableList = () =>
  import(/* webpackChunkName: "common" */ "@/pages/TableList.vue");
const Katalog = () =>
    import(/* webpackChunkName: "common" */ "@/pages/Admin/Katalog.vue");
const Drafts = () =>
    import(/* webpackChunkName: "common" */ "@/pages/Admin/Drafts.vue");
const Janjitemu = () =>
    import(/* webpackChunkName: "common" */ "@/pages/Admin/Janjitemu.vue");
    const OpsiBayar = () =>
        import(/* webpackChunkName: "common" */ "@/pages/Admin/OpsiBayar.vue");
const Mobil = () => 
    import('@/pages/Admin/Mobil.vue');

const routes = [
  {
    path: "/admin",
    component: DashboardLayout,
    redirect: "/admin/dashboard",
    children: [
      
      {
        path: "dashboard",
        name: "dashboard",
        component: Dashboard,
      },
      {
        path: "profile",
        name: "profile",
        component: Profile,
      },
      {
        path: "notifications",
        name: "notifications",
        component: Notifications,
      },
      {
        path: "icons",
        name: "icons",
        component: Icons,
      },
      {
        path: "maps",
        name: "maps",
        component: Maps,
      },
      {
        path: "typography",
        name: "typography",
        component: Typography,
      },
      {
        path: "table-list",
        name: "table-list",
        component: TableList,
      },
      {
        path: "katalog",
        name: "katalog",
        component: Katalog,
      },
      {
        path: "drafts",
        name: "drafts",
        component: Drafts,
      },
      {
        path: "janjitemu",
        name: "janjitemu",
        component: Janjitemu,
      },
      {
        path: "opsibayar",
        name: "opsibayar",
        component: OpsiBayar,
      },
      {
        path: "mobil",
        name: "mobil",
        component: Mobil,
      }
    ],
  },
  { path: "*", component: NotFound },
];

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes;
