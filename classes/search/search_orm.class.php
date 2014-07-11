<?php 

    class search_orm extends basic {

    /**
     * user id
     * 
     * @var string
     */
    private $id = NULL;

    /**
     * user username
     * 
     * @var string
     */
    private $user_id = NULL;

    /**
     * user password
     * 
     * @var string
     */
    private $flux_id = NULL;

    /**
     * user firstname
     * 
     * @var string
     */
    private $title = NULL;

    /**
     * user creation date
     * 
     * @var string
     */
    private $created = NULL;

    /**
     * user update date
     * 
     * @var string
     */
    private $updated = NULL;

    public function set_id($id) {
        check_string($id, 'id');
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_user_id($user_id) {
        check_string($user_id, 'user_id');
        $this->user_id = $user_id;
    }

    public function get_user_id() {
        return $this->user_id;
    }

    public function set_flux_id($flux_id) {
        check_string($flux_id, 'flux_id');
        $this->flux_id = $flux_id;
    }

    public function get_flux_id() {
        return $this->flux_id;
    }

    public function set_title($title) {
        check_string($title, 'title');
        $this->title = $title;
    }

    public function get_title() {
        return $this->title;
    }

    public function set_created($created) {
        check_string($created, 'created');
        $this->created = $created;
    }

    public function get_created() {
        return $this->created;
    }

    public function set_updated($updated) {
        check_string($updated, 'updated');
        $this->updated = $updated;
    }

    public function get_updated() {
        return $this->updated;
    }


}