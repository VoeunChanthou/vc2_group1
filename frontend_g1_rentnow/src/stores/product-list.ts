


import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { Shop } from '@element-plus/icons-vue';

export const productStore = defineStore('product', {
  state: () => ({
    productList: [] as Array<{ id: number, name: string, price: number, days: number, category_id: number, shop_id: number, created_at: string, updated_at: string}>
  }),
  actions: {
    async fetchProductStore() {
      try {
        const response = await axiosInstance.get('/product');
        this.productList = response.data;
        // console.log(response.data);
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
});