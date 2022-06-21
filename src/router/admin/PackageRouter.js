import Package from '../../views/admin/Package/Package';
import AddPackage from '../../views/admin/Package/AddPackage';
export default [
    {
        path: 'package',
        name: 'Package',
        component: Package
    },
    {
        path: 'addPackage',
        name: 'AddPackage',
        component: AddPackage
    },
    {
        path: 'edit_package/:id',
        name: 'EditPackage',
        component: () => import('../../views/admin/Package/EditPackage.vue')
    }
]