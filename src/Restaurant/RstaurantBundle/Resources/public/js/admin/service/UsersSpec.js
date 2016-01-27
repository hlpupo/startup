describe('Service: Users.Users', function () {

    // load the service's module
    beforeEach(module('Users'));

    // instantiate service
    var service;

    //update the injection
    beforeEach(inject(function (_Users_) {
        service = _Users_;
    }));

    /**
     * @description
     * Sample test case to check if the service is injected properly
     * */
    it('should be injected and defined', function () {
        expect(service).toBeDefined();
    });
});
