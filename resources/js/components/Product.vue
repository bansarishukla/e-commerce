<template>
  <div class="main">
    <div class="content">
      <form @submit.prevent="createProduct">
        <div class="form-group">
          <label for="productName">Product Name</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            v-model="product.name"
            placeholder="Product Name"
            :class="{ 'is-invalid': submitted && $v.product.name.$error }"
          >
          <div v-if="submitted && !$v.product.name.required" class="invalid-feedback">Product Name is required</div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPrice">Price</label>
            <input
              type="text"
              class="form-control"
              id="price"
              name="price"
              v-model="product.price"
              placeholder="Price"
              :class="{ 'is-invalid': submitted && $v.product.price.$error }"
            >
            <div v-if="submitted && $v.product.price.$error" class="invalid-feedback">
              <span v-if="!$v.product.price.required">Price is required</span>
              <span v-if="!$v.product.price.numeric">Only ditits are allowed!</span>
          </div>
          </div>
          <div class="form-group col-md-6">
            <label for="inputQuantity">Quantity</label>
            <input
              type="text"
              class="form-control"
              id="quantity"
              name="quantity"
              v-model="product.quantity"
              placeholder="Quantity"
              :class="{ 'is-invalid': submitted && $v.product.quantity.$error }"
            >
            <div v-if="submitted && $v.product.quantity.$error" class="invalid-feedback">
              <span v-if="!$v.product.quantity.required">Quantity is required</span>
              <span v-if="!$v.product.quantity.numeric">Only ditits are allowed!</span>
          </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputImage" class="col-sm-2 col-form-label title">Image</label>
          <div class="col-sm-8">
            <input
              type="file"
              ref="file"
              @change="onFileChange"
              id="image"
              name="image"
              class="form-control img"
              :class="{ 'is-invalid': submitted && $v.product.image.$error }"
            >
            <div v-if="submitted && !$v.product.image.required" class="invalid-feedback">Image is required</div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword4">Description</label>
          <textarea
            rows="4"
            class="form-control"
            v-model="product.description"
            id="description"
            name="description"
            :class="{ 'is-invalid': submitted && $v.product.description.$error }"
            >
            </textarea>
          <div v-if="submitted && !$v.product.description.required" class="invalid-feedback">Description is required</div>
        </div>
        <div class="form-group">
          <label for="inputFullDescription">Full Description</label>
          <textarea
            rows="5"
            class="form-control"
            v-model="product.full_description"
            id="full_description"
            name="full_description"
            :class="{ 'is-invalid': submitted && $v.product.full_description.$error }"
          >
          </textarea>
          <div v-if="submitted && !$v.product.full_description.required" class="invalid-feedback">Full-description is required</div>
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
import { required, numeric } from "vuelidate/lib/validators";
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
      submitted: false
    };
  },
  validations: {
    product: {
      name: {
        required
      },
      image: {
        required
      },
      description: {
        required
      },
      full_description: {
        required
      },
      price: {
        required,
        numeric
      },
      quantity: {
        required,
        numeric
      }
    },
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
    onFileChange(e)
    {
      this.product.image = this.$refs.file.files[0];
    },
    createImage(file)
    {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
          vm.product.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    async createProduct()
    {
      this.submitted = true;
      this.$v.product.$touch()
      if (this.$v.$invalid) {
        return false
      }
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
        this.$v.product.$reset()
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
    //  handleSubmit(e) {
    //     this.submitted = true;

    //     // stop here if form is invalid
    //     this.$v.$touch();
    //     if (this.$v.$invalid) {
    //         return;
    //     }

    //     alert("SUCCESS!! :-)\n\n" + JSON.stringify(this.user));
    // }
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
