import Product from '../../views/admin/Product/Product';
import AddProduct from '../../views/admin/Product/AddProduct';
export default[
    {
        path:'product',
        name: 'Product',
        component: Product
    },
    {
        path:'addProduct',
        name:'AddProduct',
        component: AddProduct
    },
    {
        path: 'edit_product/:id',
        name: 'EditProduct',
        component: () => import('../../views/admin/Product/EditProduct.vue')
    }
]