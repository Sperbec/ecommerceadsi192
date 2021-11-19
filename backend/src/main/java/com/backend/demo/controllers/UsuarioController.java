package com.backend.demo.controllers;

import com.backend.demo.models.UsuarioModel;
import com.backend.demo.repositories.UsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;
import java.util.List;

@RestController
@RequestMapping("/api/")
public class UsuarioController {

    @Autowired
    private UsuarioRepository usuarioRepository;

    /**
     * Get all users list.
     *
     * @return the list
     */
    @GetMapping("/usuarios")
    public List<UsuarioModel> getAllUsers() {
        return usuarioRepository.findAll();
    }

    /**
     * Create user user.
     *
     * @param usuarioModel the user
     * @return the user
     */
    @PostMapping("/usuarios")
    public UsuarioModel createUser(@Valid @RequestBody UsuarioModel usuarioModel) {
        return usuarioRepository.save(usuarioModel);
    }

}
