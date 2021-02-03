/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Bean;

import entity.Employee;
import interfaces.empIF;
import java.util.Collection;
import javax.inject.Named;
import javax.enterprise.context.RequestScoped;
import javax.inject.Inject;
import org.eclipse.microprofile.rest.client.inject.RestClient;

/**
 *
 * @author Admin
 */
@Named(value = "empBean")
@RequestScoped
public class empBean {

    
    @Inject @RestClient empIF eif;
    
    Collection<Employee> employee;
    
    String ename="";
    int esalary,eage;
    
    public empBean() {
    }

    public Collection<Employee> getEmployee() {
        if(ename.equals(""))
        {
            return eif.getAllEmp();
        }
        else{
            return eif.getBy(ename, eage, esalary);
        }
    }

    public void setEmployee(Collection<Employee> employee) {
        this.employee = employee;
    }

    public String getEname() {
        return ename;
    }

    public void setEname(String ename) {
        this.ename = ename;
    }

    public int getEsalary() {
        return esalary;
    }

    public void setEsalary(int esalary) {
        this.esalary = esalary;
    }

    public int getEage() {
        return eage;
    }

    public void setEage(int eage) {
        this.eage = eage;
    }
    
    public void insertemp()
    {
        Employee emp = new Employee();
        emp.setEmpname(ename);
        emp.setEmpage(eage);
        emp.setEmpsalary(esalary);
        eif.addEmp(emp);
    }
    
    public void filter()
    {
        employee=null;
        employee = eif.getBy(ename, eage, esalary);
    }
    
    public void removeemp(int id)
    {
        eif.remove(id);
    }
}
