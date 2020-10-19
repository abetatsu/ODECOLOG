<template>
<Fullcalendar
     :plugins="calendarPlugins"
     :records="records"
     :locale="'ja'"
     :selectable="true"
     @select="handleSelect"
     events=""
     :header ="{
          left: 'title',
          center: '',
          right: 'prev today next'
     }"
     :buttonText ="{
          today: '今日',
     }"
/>
</template>


<script>
import Fullcalendar from '@fullcalendar/vue';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

export default {
     components: {
     Fullcalendar
     },
     props: ["records"],
     data() {
          return {
               calendarPlugins: [dayGridPlugin, interactionPlugin],
               events: "",
               addingMode: true,
               indexToUpdate: ""
          };
     },
     created() {
          this.getEvents();
     },
     methods: {
          handleSelect(arg) {

          },
          getEvents() {

          },
     },
}
</script>


<style lang="css">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";

.fc-title:hover {
     cursor: pointer;
}
td.fc-day {
     border: #aaa solid 1px;
}

.fc-unthemed td.fc-today {
     background: #eee;
}

td.fc-sat {
     color: #8EB8FF;
}
td.fc-sun {
     color: #FF97C2;
}
td.fc-sat {
     color: #8EB8FF;
}
td.fc-sun {
     color: #FF97C2;
}
.fc-unthemed thead {
     color: #6c757d;
}
.fc-toolbar h2 {
     color: #6c757d;
}
</style>
