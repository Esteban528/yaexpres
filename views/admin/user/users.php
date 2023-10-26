<?php
    importTemplate('adminNav', 'actualAdmin', $actualAdmin ?? '');;
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div class="container admin-section main-content overflow-auto">
            <h1>Control de usuarios</h1>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
                <table class="table table-striped-columns">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Cedula</th>
                    <th>Permiso</th>
                    <th>Acciones</th>

                    <?php 
                    
                    foreach ($users as $user):?>
                        <tr class="table-primary">
                            <td><?php echo $user->id;?></td>
                            <td><?php echo $user->nombre . " " . $user->apellido;?></td>
                            <td><?php echo $user->telefono;?></td>
                            <td><?php echo $user->email;?></td>
                            <td><?php echo $user->cedula==''?'No tiene':$user->cedula; ?></td>
                            <td><?php echo $ranks[(intval($user->permiso)??0) -1]->nombre;?></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId<?php echo $user->id; ?>"">
                                Eliminar
                                </button>
                                <a class="btn btn-warning" href="/admin/users/edit?id=<?php echo $user->id;?>">Editar</a>
                            </div>
                            </td>

                            

                        </tr>
                        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="modalId<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="modalId<?php echo $user->id; ?>"Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalId<?php echo $user->id;?>Label">Eliminar a <?php echo $user->nombre . " " . $user->apellido;?> ? </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar este usuario? Esta acción es irreversible
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- <button type="button" class="btn btn-primary">Eliminar</button> -->
                <a class="btn btn-danger" href="/admin/users/delete?id=<?php echo $user->id; ?>">Eliminar</a>
            </div>
            </div>
        </div>
        </div>

                    <?php endforeach;
                    ?>

                    
                    

                </table>
            </div>

        </div>
        
    </main>
</div>