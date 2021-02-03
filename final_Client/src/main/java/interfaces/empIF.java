/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package interfaces;

import entity.Employee;
import java.util.Collection;
import java.util.List;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import org.eclipse.microprofile.rest.client.inject.RegisterRestClient;

/**
 *
 * @author Admin
 */
@RegisterRestClient(baseUri = "http://localhost:8080/final_Resource/rest/employee/")
public interface empIF {
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public List<Employee> getAllEmp();
    
    @POST
    @Produces(MediaType.APPLICATION_JSON)
    public void addEmp(Employee emp);
    
     @GET
    @Path("/filter/{empname}/{empage}/{empsalary}")
    @Produces(MediaType.APPLICATION_JSON)
    public Collection<Employee> getBy(@PathParam("empname") String ename,@PathParam("empage") int eage,@PathParam("empsalary") int esalary);
    
    @DELETE
    @Path("{id}")
    public void remove(@PathParam("id") Integer id);
}
