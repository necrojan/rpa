<template>
  <div class="py-5 ">
      <h2 class="text-2xl font-bold mb-4">Orders</h2>
      <ul v-if="items.length > 0" v-for="(item, idx) in items" :key="idx">
          <li class="flex items-center justify-between py-2 border-b border-gray-200">
              <div>
                  <span class="block text-lg font-bold">{{ item.name }}</span>
                  <span class="block text-xl font-bold text-green-500 pb-3">${{ item.price }}</span>
                  <span>
                      <input @change="handleChange"
                             :checked="item.completed"
                             :value="item.completed"
                             :id="item.id"
                             type="checkbox"
                             class="form-checkbox h-5 w-5 text-blue-600"
                      >
                  </span>
              </div>

          </li>
      </ul>
  </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Fullfiller",

    data () {
        return {
            checked: false,
            items: []
        }
    },

    computed: {
    },

    mounted() {
        Echo.channel('itemcreated')
            .listen('ItemCreated', (e) => {
                console.log('event', e);
                this.items.push(e.item);
                this.getItems();
                console.log('items inside channel', this.items);
            });

        this.getItems()
    },

    methods: {

        async handleChange(event) {
            let payload = {
                completed: event.target.checked
            };
            console.log('payload', payload)
            try {
                let response = await axios.put(`/fullfiller/${event.target.id}` , payload);
            } catch (e) {
                console.log('error', e.message);
            }
        },

        async updateItem(id, completed) {

            let payload = {
                completed: completed
            };
            try {
                let response = await axios.put(`/fullfiller/${id}` , payload);
            } catch (e) {
                console.log('error', e.message);
            }
        },

        async getItems() {
            try {
                let data = await axios.get('/cashier-list');
                this.items = data.data.items;
                console.log('from get items', this.items);
            } catch (e) {
                console.log('error', e.message);
            }

        }
    }
}
</script>

<style scoped>

</style>
