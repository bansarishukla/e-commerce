<template>
  <div class="main">
    <!-- <div class="title">
      <p>Add product</p>
    </div> -->
    <div class="content">
      <form @submit.prevent="createProduct()">
        <div class="form-group row">
          <label>Product Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="product.name">
          </div>
        </div>
        <div class="form-group row">
          <label>Image</label>
          <div class="col-md-2">
            <img :src="product.image" class="img-responsive">
          </div>
          <div class="col-md-8">
            <input type="file" ref="file" @change="onFileChange" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label>Category</label>
          {{ selectedCategories }}
          <select v-model="selectedCategories" multiple>
            <option v-for="(category,index) in categoryList"
                :key="index"
                :value="category.id">
                {{ category.name }}
              </option>
          </select>
        </div>
        <div class="form-group row">
          <label>Description</label>
          <div class="col-sm-8">
            <textarea rows="4" class="form-control" v-model="product.description"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label>Full-Description</label>
          <div class="col-sm-8">
            <textarea rows="8" class="form-control" v-model="product.full_description"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label>Price</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" v-model="product.price">
          </div>
        </div>
        <div class="form-group row">
          <label>quantity</label>
          <input type="number" class="form-control" v-model="product.quantity">
        </div>
        <div style="text-align: center">
          <button data-inline="true" type="submit" class="btn btn-primary">Add category</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    postData: {
      type: Array,
      required: true
    },
  },
  data() {
    return {
      list: [],
      selectedCategories: [],
      categoryList: [],
      product: {
        name: '',
        image: '',
        description: '',
        full_description: '',
        price: '',
        quantity: ''
      },
    };
  },
  mounted() {
    console.log('mounted');
    if(this.postData)
    {
      this.list = this.postData
    }
    this.fetchCategory()
  },
  methods: {
    onFileChange(e) {
      this.product.image = this.$refs.file.files[0];
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
          vm.product.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    async createProduct()
    {
      let data = {
        name: this.product.name,
        image: this.product.image,
        categories: this.selectedCategories,
        description: this.product.description,
        full_description: this.product.full_description,
        price: this.product.price,
        quantity: this.product.quantity
      }
      console.log(data);
      let product = new FormData();
      product.append('name', data.name);
      product.append('image', data.image);
      product.append('categories', JSON.stringify(data.categories));
      product.append('description', data.description);
      product.append('full_description', data.full_description);
      product.append('price', data.price);
      product.append('quantity', data.quantity);

      axios.post('/product', product, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
      })
      .then((res) => {
        this.product.name = '';
        this.product.image = '';
        this.product.categoryList = '';
        this.product.description = '';
        this.product.full_description = '';
        this.product.price = '';
        this.product.quantity = '';
        this.list.push(res.data.product)
      })
      .catch((err) => console.error(err));
    },
    async fetchCategory()
    {
      let res = await axios.get('/category')
      if(res.data)
      {
        this.categoryList = res.data.categories
      }
    },
  }
};
</script>
<style>
  .content {
    margin:0 0 0 50px;
  }
  .main {
    display: row;
  }
</style>
