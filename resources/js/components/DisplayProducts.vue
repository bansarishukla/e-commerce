<template>
  <div class="main">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(product, index) in list" :key="index">
          <td><img :src="product.image" height="50px" width="50px" alt="image"/></td>
          <td>{{ product.name }}</td>
          <td>
            <li v-for="(category, index) in product.categories" :key="index" class="cat_list">
              {{ category.name }}
            </li>
          </td>
          <td>{{ product.price }}</td>
          <td>{{ product.quantity }}</td>
          <td><a class="fa fa-pencil edit" aria-hidden="true" :href="'/product/' +product.id+'/edit'"></a></td>
          <td><i class="fa fa-trash delete" aria-hidden="true" @click="deleteProduct(product.id,index)"></i></td>
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
      categoryList:[],
      selectedCategory:[]
    }
  },
  mounted() {
    this.list = this.postData
    this.categories = this.categories
    this.fetchCategory();
  },
  methods: {
    async fetchData()
    {
      let res = await axios.get('/product')
      if(res.data)
      {
        this.list = res.data.product
      }
    },
    async fetchCategory()
    {
      let res = await axios.get('/category')
      if(res.data)
      {
        this.categoryList = res.data.categories
      }
    },
    deleteProduct(id, index)
    {
      axios.delete('/product/' + id)
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
