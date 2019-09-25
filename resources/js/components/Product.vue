<template>
  <div class="main">
    <div class="content">
      <form @submit.prevent="createProduct()">
        <div class="form-group">
          <label for="inputName">Product Name</label>
          <input type="text" class="form-control" id="productName" name="productName" v-model="product.name" placeholder="Product Name">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPrice">Price</label>
            <input type="text" class="form-control" id="inputPrice" v-model="product.price" placeholder="Price">
          </div>
          <div class="form-group col-md-6">
            <label for="inputQuantity">Quantity</label>
            <input type="text" class="form-control" id="inputQuantity" v-model="product.quantity" placeholder="Quantity">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputImage" class="col-sm-2 col-form-label title">Image</label>
          <div class="col-sm-8">
            <input type="file" ref="file" @change="onFileChange" class="form-control img">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword4">Description</label>
          <textarea rows="4" class="form-control" v-model="product.description"></textarea>
        </div>
        <div class="form-group">
          <label for="inputFullDescription">Full Description</label>
          <textarea rows="5" class="form-control" v-model="product.full_description"></textarea>
        </div>
        <div class="form-group">
         <label for="inputFullDescription">Category</label>
          {{ selectedCategories }}
          <select v-model="selectedCategories" multiple>
            <option v-for="(category,index) in categoryList"
                :key="index"
                :value="category.id">
                {{ category.name }}
              </option>
          </select>
        </div>
        <button data-inline="true" type="submit" class="btn btn-primary">Add category</button>
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

      let res = await axios.post('/product', product, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
      })
        this.product.name = '';
        this.product.image = '';
        this.product.categoryList = '';
        this.product.description = '';
        this.product.full_description = '';
        this.product.price = '';
        this.product.quantity = '';
        this.list.push(res.data.product)
        console.log(res)
        if(res.data.succsess) {
          this.$toaster.success('Product is added successfully')
          return true
        }
        this.$toaster.error('error');
        return false



//  this.$toaster.success('Your toaster success message.')
// // or custom timeout
// this.$toaster.success('Your toaster success message.', {timeout: 8000})

// this.$toaster.info('Your toaster info message.')
// this.$toaster.error('Your toaster error message.')
// this.$toaster.warning('Your toaster warning message.')

// or custom add method
// this.$toaster.add('Your toaster theme message.', {theme: 'info', timeout: 10000})
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
  .title {
    font-size: 20px;
    font-weight: bold;
  }
  .img {
    width: 250px;
    height: 250px;
  }
</style>
