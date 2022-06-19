import User from '../../views/admin/User/User';
//import AddUser from '../../views/admin/User/AddUser';
export default[
    {
        path:'user',
        name: 'User',
        component: User
    },
    {
        path: 'edit_user/:id',
        name: 'EditUser',
        component: () => import('../../views/admin/User/EditUser.vue')
    }
]