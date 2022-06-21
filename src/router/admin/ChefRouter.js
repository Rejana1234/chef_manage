import Chef from '../../views/admin/Chef/Chef';
import AddChef from '../../views/admin/Chef/AddChef';
export default[
    {
        path:'chef',
        name: 'Chef',
        component: Chef
    },
    {
        path: 'addchef',
        name: 'AddChef',
        component: AddChef
    },
]