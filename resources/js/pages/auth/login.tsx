import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLayout from '@/layouts/auth-layout';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/react';
import { useState } from 'react';

interface LoginProps {
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
}

export default function Login({
    status,
    canResetPassword,
    canRegister,
}: LoginProps) {
    const [loginMode, setLoginMode] = useState<'email' | 'cpf' | 'default'>('default');

    const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = e.target.value;
        const emailRegex = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i;
        const cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
        const digitsOnly = value.replace(/\D/g, '');

        if (cpfRegex.test(value) || digitsOnly.length === 11) {
            setLoginMode('cpf');
        } else if (emailRegex.test(value)) {
            setLoginMode('email');
        } else if (value === '') {
            setLoginMode('default');
        }
        // else keep previous or default
    };

    const labelText = loginMode === 'cpf' ? 'CPF' : loginMode === 'email' ? 'Email' : 'CPF ou Email';
    const placeholderText = loginMode === 'cpf' ? 'Digite seu CPF (XXX.XXX.XXX-XX)' : loginMode === 'email' ? 'email@example.com' : 'Digite seu email ou cpf';

    return (
        <AuthLayout
            title="Logue na sua conta"
            description="Faça login na sua conta para continuar"
        >
            <Head title="Login" />

            <Form
                {...store.form()}
                resetOnSuccess={['password']}
                className="flex flex-col gap-6"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="grid gap-6">
                            <div className="grid gap-2">
                                <Label htmlFor="email">{labelText}</Label>
                                <Input
                                    id="email"
                                    type="text"
                                    name="email"
                                    required
                                    autoFocus
                                    tabIndex={1}
                                    autoComplete={loginMode === 'cpf' ? 'cpf' : loginMode === 'email' ? 'email' : 'username'}
                                    placeholder={placeholderText}
                                    onChange={handleInputChange}
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="grid gap-2">
                                <div className="flex items-center">
                                    <Label htmlFor="password">Senha</Label>
                                    {canResetPassword && (
                                        <TextLink
                                            href={request()}
                                            className="ml-auto text-sm"
                                            tabIndex={5}
                                        >
                                            Esqueceu o password?
                                        </TextLink>
                                    )}
                                </div>
                                <Input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    tabIndex={2}
                                    autoComplete="current-password"
                                    placeholder="Password"
                                />
                                <InputError message={errors.password} />
                            </div>

                            <div className="flex items-center space-x-3">
                                <Checkbox
                                    id="remember"
                                    name="remember"
                                    tabIndex={3}
                                />
                                <Label htmlFor="remember">Lembrar de mim</Label>
                            </div>

                            <Button
                                type="submit"
                                className="mt-4 w-full"
                                tabIndex={4}
                                disabled={processing}
                                data-test="login-button"
                            >
                                {processing && <Spinner />}
                                Login
                            </Button>
                        </div>

                        {canRegister && (
                            <div className="text-center text-sm text-muted-foreground">
                                Não tem uma conta?{' '}
                                <TextLink href={register()} tabIndex={5}>
                                    Registre-se
                                </TextLink>
                            </div>
                        )}
                    </>
                )}
            </Form>

            {status && (
                <div className="mb-4 text-center text-sm font-medium text-green-600">
                    {status}
                </div>
            )}
        </AuthLayout>
    );
}
