package com.mycompany.final_resource.config;
import javax.annotation.security.RolesAllowed;
import javax.ws.rs.ApplicationPath;
import org.eclipse.microprofile.auth.LoginConfig;

@SuppressWarnings({"EmptyClass", "SuppressionAnnotation"})
@ApplicationPath("rest")
@RolesAllowed("{Admin,User}")
@LoginConfig(authMethod = "MP-JWT")
public class BootStrap extends javax.ws.rs.core.Application {
}
