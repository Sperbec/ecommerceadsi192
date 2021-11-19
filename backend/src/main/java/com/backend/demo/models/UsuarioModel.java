package com.backend.demo.models;

import lombok.Getter;
import lombok.Setter;
import org.springframework.data.jpa.domain.support.AuditingEntityListener;

import javax.persistence.*;

@Entity
@Table(name = "usuarios")
@EntityListeners(AuditingEntityListener.class)
public class UsuarioModel {

    @Id
    @Getter
    @Setter
    @GeneratedValue(strategy = GenerationType.AUTO)
    private long id;

    @Getter
    @Setter
    @Column(name = "nombre", nullable = false)
    private String nombre;

    @Getter
    @Setter
    @Column(name = "apellido", nullable = false)
    private String apellido;

    @Getter
    @Setter
    @Column(name = "email", nullable = false)
    private String email;

}
