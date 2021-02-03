package com.mycompany.final_resource.service;

import com.mycompany.final_resource.entity.Employee;
import java.util.Collection;
import java.util.List;
import javax.annotation.security.RolesAllowed;
import javax.persistence.EntityManager;
import javax.persistence.Persistence;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;


@Path("/employee")
public class EmployeeService {

    EntityManager em = Persistence.createEntityManagerFactory("empPU").createEntityManager();
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public List<Employee> getAllEmp()
    {
        return em.createNamedQuery("Employee.findAll").getResultList();
    }
    
    @POST
    @Produces(MediaType.APPLICATION_JSON)
    public void addEmp(Employee emp)
    {
        em.getTransaction().begin();
        
        Employee newemp = new Employee();
        
        newemp.setEmpname(emp.getEmpname());
        newemp.setEmpage(emp.getEmpage());
        newemp.setEmpsalary(emp.getEmpsalary());
        
        em.persist(newemp);
        
        em.getTransaction().commit();
    }

    @GET
    @Path("/filter/{empname}/{empage}/{empsalary}")
    @Produces(MediaType.APPLICATION_JSON)
    public Collection<Employee> getBy(@PathParam("empname") String ename,@PathParam("empage") int eage,@PathParam("empsalary") int esalary)
    {
       return em.createNamedQuery("Employee.filter").setParameter("empname", ename).setParameter("empage", eage).setParameter("empsalary", esalary).getResultList();
    }
 
    @DELETE
    @Path("{id}")
    public void remove(@PathParam("id") Integer id)
    {
        em.remove(em.find(Employee.class, id));
    }
}
