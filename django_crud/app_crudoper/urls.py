from django.urls import path
from app_crudoper import views

urlpatterns = [
    path('view/<int:id>', views.view, name='view'),
    path('show/', views.show, name='show'),
    path('register/', views.register, name='register'),
    path('', views.register, name='register'),
    path('update/<int:id>', views.update, name='update'),
    path('delete/<int:id>/<str:username>/', views.destro, name='destro'),
    path('login/', views.login, name='login'),
    path('logout/', views.logout, name='logout'),
]