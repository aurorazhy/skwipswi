<template>
  <div class="wrapper">
   <side-bar>
      <template slot="links">
        <sidebar-link
          to="/admin/dashboard"
          :name="$t('sidebar.dashboard')"
          icon="tim-icons icon-components"
        />
        <sidebar-link
          to="/admin/janjitemu"
          :name="$t('Janji Temu')"
          icon="tim-icons icon-cart"
        />
        <sidebar-link
          to="/admin/mobil"
          :name="$t('mobil')"
          icon="tim-icons icon-bus-front-12"
        />
        <sidebar-link
          to="/admin/katalog"
          :name="$t('katalog')"
          icon="tim-icons icon-bag-16"
        />
        
        <sidebar-link
          to="/admin/opsibayar"
          :name="$t('opsi bayar')"
          icon="tim-icons icon-coins"
        />
        <sidebar-link
          to="/admin/icons"
          :name="$t('sidebar.icons')"
          icon="tim-icons icon-atom"
        />
        <sidebar-link
          to="/admin/maps"
          :name="$t('sidebar.maps')"
          icon="tim-icons icon-pin"
        />
        <sidebar-link
          to="/admin/notifications"
          :name="$t('sidebar.notifications')"
          icon="tim-icons icon-bell-55"
        />
        <sidebar-link
          to="/admin/profile"
          :name="$t('sidebar.userProfile')"
          icon="tim-icons icon-single-02"
        />
        <sidebar-link
          to="/admin/table-list"
          :name="$t('sidebar.tableList')"
          icon="tim-icons icon-puzzle-10"
        />
        <sidebar-link
          to="/admin/typography"
          :name="$t('sidebar.typography')"
          icon="tim-icons icon-align-center"
        />
        <sidebar-link
          to="/admin/dashboard?enableRTL=true"
          :name="$t('sidebar.rtlSupport')"
          icon="tim-icons icon-world"
        />
        
      </template>
    </side-bar>
    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content @click.native="toggleSidebar"> </dashboard-content>

      <content-footer></content-footer>
    </div>
  </div>
</template>
<style lang="scss"></style>
<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "./MobileMenu";
export default {
  components: {
    TopNavbar,
    ContentFooter,
    DashboardContent,
  },
  methods: {
    toggleSidebar() {
      if (this.$sidebar.showSidebar) {
        this.$sidebar.displaySidebar(false);
      }
    },
  },
};
</script>
