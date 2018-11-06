<script>
  import App from '../App.vue';
  import { EventBus } from '../scripts/event.js';
  
  export default {
    name: 'modal',
    template: '#modal-template',
    data: function() {
      return { show: false, showError:false };
    },
    mounted(){
      EventBus.$on('showModal', e => {
        this.open();
      });
      EventBus.$on('closeModal', e => {
        this.close();
      });
      EventBus.$on('error', e => {
        this.error();
      });
    },
    methods: {
      open: function() {
        this.show = true;
      },
      close: function() {
        this.show = false;
        this.showError = false;
      },
      error: function() {
        this.showError = true;
      }
    },
  };
</script>
<template id="modal-template">
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container">
        <div class="modal-header">
          <slot name="header">default header</slot>
        </div>
        <div class="modal-body">
          <slot name="body">default body</slot>
        </div>
        <div class="modal-footer" v-show="showError">
          <slot name="footer"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
body {
  padding: 4rem;
}
[v-cloak] {
  display: none;
}
.modal-mask {
  position: fixed;
  z-index: 10100;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  display: table;
  transition: opacity 0.3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-container {
  width: 500px;
  margin: 0px auto;
  padding: 20px 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}
.modal-body {
  margin: 20px 0;
}
.modal-button {
  float: right;
}
.modal-enter,
.modal-leave {
  opacity: 0;
}
.modal-enter .modal-container,
.modal-leave .modal-container {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
</style>
