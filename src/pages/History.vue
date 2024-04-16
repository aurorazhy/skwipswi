<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <card class="card" :header-classes="{ 'text-right': isRTL }">
          <!-- <h4 slot="header" class="card-title">
            {{ $t("dashboard.simpleTable") }}
          </h4> -->
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No HP</th>
          <th>Mobil</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="idk in idks" :key="idk.id">
          <td>{{ idk.id }}</td>
          <td>{{ idk.name }}</td>
          <td>{{ idk.email }}</td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <button class="btn btn-primary" @click="editidk(idk)">Edit</button>
            <button class="btn btn-danger" @click="deleteidk(idk.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
          </div>
        </card>
      </div>
    </div>
  </div>
</template>
<script>
// import LineChart from "@/components/Charts/LineChart";
// import BarChart from "@/components/Charts/BarChart";
import * as chartConfigs from "@/components/Charts/config";
// import TaskList from "./Dashboard/TaskList";
import UserTable from "./Dashboard/UserTable";
import config from "@/config";

export default {
  components: {
    
  },
  data() {
    return {
      idks: [
        { id: 1, name: 'John Doe', email: 'john.doe@example.com' },
        { id: 2, name: 'Jane Doe', email: 'jane.doe@example.com' },
        { id: 3, name: 'Bob Smith', email: 'bob.smith@example.com' },
        { id: 3, name: 'Bob Smith', email: 'bob.smith@example.com' }
      ],
    };
  },
 
  computed: {
    
  },
  methods: {
    editUser(user) {
      // handle edit user
    },
    deleteUser(id) {
      // handle delete user
    },
    },
  mounted() {
    this.i18n = this.$i18n;
    if (this.enableRTL) {
      this.i18n.locale = "ar";
      this.$rtl.enableRTL();
    }
    this.initBigChart(0);
  },
  beforeDestroy() {
    if (this.$rtl.isRTL) {
      this.i18n.locale = "en";
      this.$rtl.disableRTL();
    }
  },
};
</script>
<style></style>./Drafts.vue
