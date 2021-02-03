/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package interfaces;

import javax.annotation.security.RolesAllowed;
import javax.ws.rs.GET;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import org.eclipse.microprofile.rest.client.annotation.ClientHeaderParam;
import org.eclipse.microprofile.rest.client.inject.RegisterRestClient;
import token.GenerateToken;

/**
 *
 * @author Admin
 */
@RegisterRestClient(baseUri = "http://localhost:8080/final_Resource/rest/example")
public interface jwtClietnIF {
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    @ClientHeaderParam(name = "authorization",value = "{temp}")
    public String get();
    
    default String temp()
    {
        return "Bearer " + GenerateToken.generateJWT();
    }
}
