import { NextPage } from 'next';
import Head from 'next/head';
import { Header } from '@/components/organisms/Header';
import { Button, Container, FormControl, FormLabel, Input } from '@chakra-ui/react';
import { useForm, SubmitHandler } from 'react-hook-form';
import { usePost } from '@/hooks/usePost';

type FormValues = {
  name: string;
  email: string;
  password: string;
};

const Register: NextPage = () => {
  const endPoint = 'api/register';
  const { register, handleSubmit } = useForm<FormValues>();
  const mutate = usePost(endPoint);

  const onSubmit: SubmitHandler<FormValues> = (data) => {
    mutate(data);
  };

  return (
    <>
      <Head>
        <title>ユーザー登録ページ</title>
      </Head>
      <Header />
      <Container>
        <form onSubmit={handleSubmit(onSubmit)}>
          <FormControl isRequired>
            <FormLabel>ユーザー名</FormLabel>
            <Input id="name" placeholder="ユーザー名" {...register('name')}></Input>
          </FormControl>
          <FormControl isRequired>
            <FormLabel>メールアドレス</FormLabel>
            <Input
              id="email"
              type="email"
              placeholder="メールアドレスを入力"
              {...register('email')}
            ></Input>
          </FormControl>
          <FormControl isRequired>
            <FormLabel>パスワード</FormLabel>
            <Input id="password" placeholder="パスワードを入力" {...register('password')}></Input>
          </FormControl>
          <Button type="submit">登録する</Button>
        </form>
      </Container>
    </>
  );
};

export default Register;
