<template>
  <div class="main">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Price</th>
          <th scope="col">Card_number</th>
          <th scope="col">Address</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(orders, index) in list" :key="index">
          <td>{{ orders.name }}</td>
          <td>{{ orders.mobile}}</td>
          <td>{{ orders.price }}</td>
          <td>{{ orders.card_number }}</td>
          <td>{{ orders.address }}</td>
          <td><i class="fa fa-trash delete" aria-hidden="true" @click="deleteProduct(orders.id,index)"></i></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props:{
    postData:{
      type:Array,
      required:true
    }
  },
  data() {
    return {
      list:[],
    }
  },
  mounted() {
    this.list = this.postData
  },
  methods: {
    async fetchData()
    {
      let res = await axios.get('/order-list')
      if(res.data)
      {
        this.list = res.data.orders
      }
    },
    deleteProduct(id, index)
    {
      axios.delete('/order/' + id)
        .then((res) => {
          this.list.splice(index,1)
        })
        .catch((err) => console.error(err));
    }
  }
};
</script>
<style>
  .cat_list {
    list-style: none;
  }
</style>
